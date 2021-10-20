<?php

namespace App;

/**
 * As this class cannot be instansiated it is abstract.
 * It implements the contract specifed by a Turn interface.
 */
abstract class Move implements Turn
{
    protected $beats = [];

    public function __construct(...$beats)
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
            if (get_class($beat) === get_class($opponent)) {
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
}
