<?php

namespace App;

/**
 * Rock defines the moves it beats, loses and draws against.
 */
class Rock extends Move
{
    public function __construct()
    {
        $this->beats = [self::SCISSORS, self::LIZARD];
        $this->loses = [self::PAPER, self::SPOCK];
        $this->type = self::ROCK;
    }
}
