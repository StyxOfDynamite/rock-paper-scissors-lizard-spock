<?php

require __DIR__ . '/../vendor/autoload.php';

use App\Computer;
use App\Game;
use App\Human;

$options = [
    'gameWonAt' => 5,
];

$game = new Game($options);
$player = new Human('John Doe');
$computer = new Computer();

$game->addPlayer($player);
$game->addPlayer($computer);

while (! $game->isFinished()) {
    $player->setMove($player->chooseMove());
    printf("%s played %s\n", $player, $player->getMove()->getType());
    
    $computer->setMove($computer->chooseMove());
    printf("%s played %s\n", $computer, $computer->getMove()->getType());


    if ($player->getMove()->draws($computer->getMove())) {
        printf("Draw\n");
    }
    
    if ($player->getMove()->beats($computer->getMove())) {
        $player->addWin();
        printf("Win\n");
    }

    if ($player->getMove()->loses($computer->getMove())) {
        $computer->addWin();
        printf("Lose\n");
    }
}

$game->setWinner($game->findWinner());

// output game->winner
printf("=== GAME WON BY ==== %s\n", $game->getWinner());
