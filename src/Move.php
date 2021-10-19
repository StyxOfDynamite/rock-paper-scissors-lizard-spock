<?php

namespace App;

abstract class Move implements Turn
{
    protected $type;
    protected $beats = [];
    protected $loses = [];

    const ROCK = 'ROCK';
    const PAPER = 'PAPER';
    const SCISSORS = 'SCISSORS';
    const LIZARD = 'LIZARD';
    const SPOCK = 'SPOCK';

    public function beats(Move $opponent)
    {
        return in_array($opponent->getType(), $this->beats);
    }

    public function draws(Move $opponent)
    {
        return $opponent->getType() === $this->getType();
    }

    public function loses(Move $opponent)
    {
        return in_array($opponent->getType(), $this->loses);
    }

    public function getType()
    {
        return $this->type;
    }
}
