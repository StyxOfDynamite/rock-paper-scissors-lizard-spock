<?php

namespace App;

class MoveFactory implements Factory
{
    public function createRock(): Rock
    {
        return new Rock();
    }

    public function createPaper(): Paper
    {
        return new Paper();
    }

    public function createScissors(): Scissors
    {
        return new Scissors();
    }
}
