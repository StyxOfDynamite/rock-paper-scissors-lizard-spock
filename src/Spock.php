<?php

namespace App;

class Spock extends Move
{
    public function __construct()
    {
        $this->beats = [self::ROCK, self::SCISSORS];
        $this->loses = [self::PAPER, self::LIZARD];
        $this->type = self::SPOCK;
    }
}
