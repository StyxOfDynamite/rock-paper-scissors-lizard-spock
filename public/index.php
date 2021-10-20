<?php

require __DIR__ . '/../vendor/autoload.php';

use App\Computer;
use App\Game;
use App\Human;
use App\LoggerFactory;
use App\ScreenLogger;
use App\SimpleFileLogger;

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





$game = new Game($options, $loggerFactory);
$player = new Human('John Doe', $loggerFactory);
$computer = new Computer($loggerFactory);

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
