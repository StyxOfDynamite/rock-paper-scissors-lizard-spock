<?php

namespace App;

/**
 * Scissors defines the moves it beats, loses and draws against.
 */
class Scissors extends Move
{
    public function __construct()
    {
        $this->beats = [self::PAPER];
        $this->loses = [self::ROCK];
        $this->type = self::SCISSORS;
    }
}
