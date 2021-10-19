<?php

namespace App;

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

    public function setMove(Move $move)
    {
        $this->move = $move;
    }

    public function getMove()
    {
        return $this->move;
    }

    public function addWin()
    {
        $this->score++;
    }

    public function getScore()
    {
        return $this->score;
    }

    public function __toString()
    {
        return sprintf("%s", $this->name);
    }

    abstract public function chooseMove();
}
