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

$moveFactory->registerMove('rock', function () {
    $instance = new Rock(new Lizard(), new Scissors());
    return $instance;
});

$moveFactory->registerMove('paper', function () {
    $instance = new Paper(new Rock(), new Spock());
    return $instance;
});

$moveFactory->registerMove('scissors', function () {
    $instance = new Scissors(new Lizard(), new Paper());
    return $instance;
});

$moveFactory->registerMove('lizard', function () {
    $instance = new Lizard(new Spock(), new Paper());
    return $instance;
});

$moveFactory->registerMove('spock', function () {
    $instance = new Spock(new Scissors(), new Rock());
    return $instance;
});

$moveFactory->registerMove('bomb', function () {
    $instance = new Bomb(new Rock(), new Paper(), new Scissors(), new Lizard(), new Spock());
    return $instance;
});


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

while (! $game->isFinished()) {
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
$slack->log(sprintf("GAME WON BY %s", $game->getWinner()));
