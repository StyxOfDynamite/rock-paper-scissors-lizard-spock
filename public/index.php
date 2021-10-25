<?php

require __DIR__ . '/../vendor/autoload.php';

use App\Bomb;
use App\Computer;
use App\Game;
use App\Human;
use App\Lizard;
use App\LoggerFactory;
use App\MoveFactory;
use App\Paper;
use App\Rock;
use App\Scissors;
use App\ScreenLogger;
use App\SimpleFileLogger;
use App\Spock;

$options = [
    'gameWonAt' => 5,
];

$loggerFactory = new LoggerFactory;

$loggerFactory->addProvider('simple', function () {
    $instance = new SimpleFileLogger('log.txt');
    return $instance;
});

$loggerFactory->addProvider('screen', function () {
    $instance = new ScreenLogger();
    return $instance;
});

$moveFactory = new MoveFactory;

$moveFactory->registerMove('rock', function () {
    $instance = new Rock(new Lizard, new Scissors);
    return $instance;
});

$moveFactory->registerMove('paper', function () {
    $instance = new Paper(new Rock, new Spock);
    return $instance;
});

$moveFactory->registerMove('scissors', function () {
    $instance = new Scissors(new Lizard, new Paper);
    return $instance;
});

$moveFactory->registerMove('lizard', function () {
    $instance = new Lizard(new Spock, new Paper);
    return $instance;
});

$moveFactory->registerMove('spock', function () {
    $instance = new Spock(new Scissors, new Rock);
    return $instance;
});

$moveFactory->registerMove('bomb', function () {
    $instance = new Bomb(new Rock, new Paper, new Scissors, new Lizard, new Spock);
    return $instance;
});

$game = new Game($options, $loggerFactory);
$player = new Human('John Doe', $loggerFactory, $moveFactory);
$computer = new Computer($loggerFactory, $moveFactory);

$game->addPlayer($player);
$game->addPlayer($computer);

while (! $game->isFinished()) {
    $player->setMove($player->chooseMove());
    $computer->setMove($computer->chooseMove());

    if ($player->getMove()->draws($computer->getMove())) {
        printf("Draw\n");
    }
    
    if ($player->getMove()->beats($computer->getMove())) {
        $player->addWin();
        printf("Win\n");
    }

    if ($computer->getMove()->beats($player->getMove())) {
        $computer->addWin();
        printf("Lose\n");
    }
}

$game->setWinner($game->findWinner());

// output game->winner
printf("=== GAME WON BY ==== %s\n", $game->getWinner());
