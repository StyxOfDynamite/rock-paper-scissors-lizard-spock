<?php

namespace App;

/**
 * This interface defines the contract that a class representing a move must adhere to.
 * Any move must implement beats and draws.
 */
interface Turn
{
    public function beats(Move $move);
    public function draws(Move $move);
}
