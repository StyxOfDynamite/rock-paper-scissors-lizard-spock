<?php

namespace App;

/**
 * Paper defines the moves it beats, loses and draws against.
 */
class Paper extends Move
{
    public function __construct()
    {
        $this->beats = [self::ROCK, self::SPOCK];
        $this->loses = [self::SCISSORS, self::LIZARD];
        $this->type = self::PAPER;
    }
}
