<?php

namespace App;

/**
 * The player class cannot be instansiated so is abstract.
 * It holds a players name, score and current move.
 * It contains a move factory for returning the required move.
 */
abstract class Player
{
    protected $name;
    protected $move;
    protected $score;
    protected $moveFactory;

    public function __construct(string $name)
    {
        $this->name = $name;
        $this->score = 0;
        $this->moveFactory = new MoveFactory;
    }

    /**
     * Setter for the current move.
     */
    public function setMove(Move $move)
    {
        $this->move = $move;
    }

    /**
     * Getter for the current move.
     */
    public function getMove()
    {
        return $this->move;
    }

    /**
     * addWin() is called when a player wins a round to increase a players score.
     */
    public function addWin()
    {
        $this->score++;
    }

    /**
     * Getter for the current score.
     */
    public function getScore()
    {
        return $this->score;
    }

    /**
     * toString() returns a simple representation of the the class as a string.
     * in this instance just the name
     */
    public function __toString()
    {
        return sprintf("%s", $this->name);
    }

    /**
     * an abstract method forces the method to be implemented in child classes.
     * so each type of player must implement a chooseMove() method.
     */
    abstract public function chooseMove();
}
