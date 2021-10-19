<?php

namespace App;

class Lizard extends Move
{
    public function __construct()
    {
        $this->beats = [self::PAPER, self::SPOCK];
        $this->loses = [self::SCISSORS, self::ROCK];
        $this->type = self::LIZARD;
    }
}
