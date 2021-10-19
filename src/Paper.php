<?php

namespace App;

/**
 * Paper defines the moves it beats, loses and draws against.
 */
class Paper extends Move
{
    public function __construct()
    {
        $this->beats = [self::ROCK];
        $this->loses = [self::SCISSORS];
        $this->type = self::PAPER;
    }
}
