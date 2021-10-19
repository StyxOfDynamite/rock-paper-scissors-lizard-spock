<?php

namespace App;

class Paper extends Move
{
    public function __construct()
    {
        $this->beats = [self::ROCK];
        $this->loses = [self::SCISSORS];
        $this->type = self::PAPER;
    }
}
