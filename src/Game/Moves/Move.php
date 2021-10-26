<?php

namespace App\Game\Moves;

/**
 * As this class cannot be instansiated it is abstract.
 * It implements the contract specifed by a Turn interface.
 */
abstract class Move implements Turn
{
    protected $beats = [];
    protected $probability = 100;

    public function __construct(Move ...$beats)
    {
        $this->beats = $beats;
    }

    /**
     * beats() must be implemented in a way
     * that all moves can call it against an opponents move.
     */
    public function beats(Move $opponent)
    {
        foreach ($this->beats as $beat) {
            if ($beat instanceof $opponent) {
                return true;
            }
        }
        return false;
    }

    /**
     * draws() must be implemented in a way
     * that all moves can call it against an opponents move.
     */
    public function draws(Move $opponent)
    {
        return $opponent instanceof $this;
    }

    /**
     * Return the string representation of the class.
     */
    public function __toString()
    {
        return get_class($this);
    }

    public function getProbability()
    {
        return $this->probability;
    }
}
