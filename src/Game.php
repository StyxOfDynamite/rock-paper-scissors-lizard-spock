<?php

namespace App;

class Game
{
    protected $players = [];
    protected $gameOverAt;

    public function __construct(array $options)
    {
        $this->players = [];
        $this->gameOverAt = $options['gameWonAt'];

        return $this;
    }

    public function addPlayer(Player $player)
    {
        $this->players[] = $player;
    }

    public function isFinished()
    {
        foreach ($this->players as $player) {
            if ($player->getScore() === $this->gameOverAt) {
                return true;
            }
        }

        return false;
    }

    public function findWinner()
    {
        foreach ($this->players as $player) {
            if ($player->getScore() === $this->gameOverAt) {
                return $player;
            }
        }
    }

    public function setWinner(Player $player)
    {
        $this->winner = $player;
    }
}
