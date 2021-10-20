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
        /**
         * The concrete Rock class, injects the Moves it is capable of beating via the constructor.
         * This enables easier modification of the Game Move Types
         */
        return new Rock(new Scissors, new Lizard);
    }

    public function createPaper(): Paper
    {
        /**
         * The concrete Paper class, injects the Moves it is capable of beating via the constructor.
         * This enables easier modification of the Game Move Types
         */
        return new Paper(new Spock, new Rock);
    }

    public function createScissors(): Scissors
    {
        /**
         * The concrete Scissors class, injects the Moves it is capable of beating via the constructor.
         * This enables easier modification of the Game Move Types
         */
        return new Scissors(new Paper, new Lizard);
    }

    public function createLizard(): Lizard
    {
        /**
         * The concrete Lizard class, injects the Moves it is capable of beating via the constructor.
         * This enables easier modification of the Game Move Types
         */
        return new Lizard(new Paper, new Spock);
    }

    public function createSpock(): Spock
    {
        /**
         * The concrete Spock class, injects the Moves it is capable of beating via the constructor.
         * This enables easier modification of the Game Move Types
         */
        return new Spock(new Rock, new Scissors);
    }
}
