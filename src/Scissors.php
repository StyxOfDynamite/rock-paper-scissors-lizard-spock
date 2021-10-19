<?php

namespace App;

/**
 * Scissors defines the moves it beats, loses and draws against.
 */
class Scissors extends Move
{
    public function __construct()
    {
        $this->beats = [self::PAPER, self::LIZARD];
        $this->loses = [self::ROCK, self::SPOCK];
        $this->type = self::SCISSORS;
    }
}
