<?php

namespace App;

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

        $logger = $this->loggerFactory->provide('simple');
        $logger->log("=== New Game ===\n");

        return $this;
    }

    public function addPlayer(Player $player)
    {
        $this->players[] = $player;
        $logger = $this->loggerFactory->provide('simple');
        $logger->log(sprintf("\tAdded Player (%s)\n", $player));
    }
    
    /**
     * This method determins if any of the players has reached the score required to win.
     */
    public function isFinished()
    {
        foreach ($this->players as $player) {
            if ($player->getScore() === $this->gameOverAt) {
                $logger = $this->loggerFactory->provide('simple');
                $logger->log(sprintf("=== Game Finished ===\n"));
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
                $logger = $this->loggerFactory->provide('simple');
                $logger->log(sprintf("\tWinner is %s!\n", $player));
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
}
