<?php

namespace App;

/**
 * This Factory returns concrete implementations of the available moves.
 * If the Interface added new moves, they would have to be implemented here.
 */
class MoveFactory implements MoveFactoryInterface
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

    public function createLizard(): Lizard
    {
        return new Lizard();
    }

    public function createSpock(): Spock
    {
        return new Spock();
    }
}
