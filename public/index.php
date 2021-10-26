<?php

use App\Game\Game;
use App\Game\Logging\LoggerFactory;
use App\Game\Logging\ScreenLogger;
use App\Game\Logging\SimpleFileLogger;
use App\Game\Logging\SlackLogger;
use App\Game\Moves\Bomb;
use App\Game\Moves\Lizard;
use App\Game\Moves\MoveFactory;
use App\Game\Moves\Paper;
use App\Game\Moves\Rock;
use App\Game\Moves\Scissors;
use App\Game\Moves\Spock;
use App\Game\Players\Computer;
use App\Game\Players\Human;

require __DIR__ . '/../vendor/autoload.php';

// Setup logging.

$loggerFactory = new LoggerFactory;

$loggerFactory->addProvider('simple', function () {
    $instance = new SimpleFileLogger('full.log');
    return $instance;
});

$loggerFactory->addProvider('slack', function () {
    $instance = new SlackLogger('https://webhooks.slack.com/XYZ/123');
    return $instance;
});

$loggerFactory->addProvider('screen', function () {
    $instance = new ScreenLogger();
    return $instance;
});

// Setup moves.

$moveFactory = new MoveFactory;

$moveFactory->registerMove('rock', new Rock(new Scissors()));
$moveFactory->registerMove('paper', new Paper(new Rock()));
$moveFactory->registerMove('scissors', new Scissors(new Paper()));
$moveFactory->registerMove('bomb', new Bomb(new Rock(), new Paper(), new Scissors()));




// Create game
$options = [
    'gameWonAt' => 2
];

$game = new Game($options, $loggerFactory);

$log = $game->getLoggerFactory()->provide('simple');
$slack = $game->getLoggerFactory()->provide('slack');
$screen = $game->getLoggerFactory()->provide('screen');

$player = new Human('John Doe', $moveFactory);
$log->log(sprintf("Added %s", $player));
$computer = new Computer($moveFactory);
$log->log(sprintf("Added %s", $computer));

$game->addPlayer($player);
$game->addPlayer($computer);

while (!$game->isFinished()) {
    $player->setMove($player->chooseMove());
    $log->log(sprintf("%s played %s", $player, $player->getMove()));
    $screen->log(sprintf("%s played %s", $player, $player->getMove()));

    $computer->setMove($computer->chooseMove());
    $log->log(sprintf("%s played %s", $computer, $computer->getMove()));
    $screen->log(sprintf("%s played %s", $computer, $computer->getMove()));

    if ($player->getMove()->draws($computer->getMove())) {
        $log->log(sprintf("DRAW!"));
        $screen->log(sprintf("DRAW!"));
    }

    if ($player->getMove()->beats($computer->getMove())) {
        $log->log(sprintf("%s WINS!", $player));
        $screen->log(sprintf("%s WINS!", $player));
        $player->addWin();
    }

    if ($computer->getMove()->beats($player->getMove())) {
        $log->log(sprintf("%s WINS!", $computer));
        $screen->log(sprintf("%s WINS!", $computer));
        $computer->addWin();
    }
}

$game->setWinner($game->findWinner());

// output game->winner
$log->log(sprintf("GAME WON BY %s", $game->getWinner()));
$slack->log(sprintf("GAME WON BY %s", $game->getWinner()));
