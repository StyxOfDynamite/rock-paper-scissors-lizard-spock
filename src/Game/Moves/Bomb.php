<?php

namespace App\Game\Moves;

/**
 * Bomb!
 */
class Bomb extends Move
{
    protected $probability = 1;

    public function __toString()
    {
        return 'bomb';
    }
}
