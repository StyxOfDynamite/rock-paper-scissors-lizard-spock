<?php

namespace App;

/**
 * As this class cannot be instansiated it is abstract.
 * It implements the contract specifed by a Turn interface.
 */
abstract class Move implements Turn
{
    protected $type;
    protected $beats = [];
    protected $loses = [];

    /**
     * These constants are used to define the available move types.
     */
    const ROCK = 'ROCK';
    const PAPER = 'PAPER';
    const SCISSORS = 'SCISSORS';

    /**
     * beats() must be implemented in a way
     * that all moves can call it against an opponents move.
     */
    public function beats(Move $opponent)
    {
        return in_array($opponent->getType(), $this->beats);
    }

    /**
     * draws() must be implemented in a way
     * that all moves can call it against an opponents move.
     */
    public function draws(Move $opponent)
    {
        return $opponent->getType() === $this->getType();
    }

    /**
     * loses() must be implemented in a way
     * that all moves can call it against an opponents move.
     */
    public function loses(Move $opponent)
    {
        return in_array($opponent->getType(), $this->loses);
    }

    /**
     * getType is a simple getter used when comparing moves.
     */
    public function getType()
    {
        return $this->type;
    }
}
