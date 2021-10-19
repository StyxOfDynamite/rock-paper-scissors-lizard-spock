<?php

namespace App;

/**
 * This interface defines the contract that a class for creating the moves must adhere to
 * It can be extended to add new "Move" types.
 */
interface MoveFactoryInterface
{
    public function createRock(): Rock;

    public function createPaper(): Paper;

    public function createScissors(): Scissors;
    
    public function createLizard(): Lizard;

    public function createSpock(): Spock;
}
