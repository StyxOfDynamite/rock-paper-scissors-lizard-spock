<?php

namespace App;

class Rock extends Move
{
    public function __construct()
    {
        $this->beats = [self::SCISSORS];
        $this->loses = [self::PAPER];
        $this->type = self::ROCK;
    }
}
