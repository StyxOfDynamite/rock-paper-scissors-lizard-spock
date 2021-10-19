<?php

namespace App;

class Scissors extends Move
{
    public function __construct()
    {
        $this->beats = [self::PAPER];
        $this->loses = [self::ROCK];
        $this->type = self::SCISSORS;
    }
}
