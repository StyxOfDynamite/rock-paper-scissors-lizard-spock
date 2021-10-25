<?php

namespace App\Game;

use App\Game\Logging\LoggerFactoryInterface;
use App\Game\Players\Player;

/**
 * The game class holds the players and the score required to win as well as the winner.
 */
class Game
{
    protected $players = [];
    protected $gameOverAt = 3;
    protected $winner = null;
    private $loggerFactory = null;

    public function __construct(array $options, LoggerFactoryInterface $loggerFactory)
    {
        $this->loggerFactory = $loggerFactory;
        $this->players = [];
        $this->gameOverAt = $options['gameWonAt'];

        return $this;
    }

    public function addPlayer(Player $player)
    {
        $this->players[] = $player;
    }
    
    /**
     * This method determins if any of the players has reached the score required to win.
     */
    public function isFinished()
    {
        foreach ($this->players as $player) {
            if ($player->getScore() === $this->gameOverAt) {
                return true;
            }
        }

        return false;
    }

    /**
     * This returns the winner of the game, the first player to have reached the score required to win.
     */
    public function findWinner()
    {
        foreach ($this->players as $player) {
            if ($player->getScore() === $this->gameOverAt) {
                return $player;
            }
        }
    }

    /**
     * This is a setter to add the winner.
     */
    public function setWinner(Player $player)
    {
        $this->winner = $player;
    }

    /**
     * Getter for the winner.
     */
    public function getWinner() : Player
    {
        return $this->winner;
    }

    public function getLoggerFactory(): LoggerFactoryInterface
    {
        return $this->loggerFactory;
    }
}
