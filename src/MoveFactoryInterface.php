<?php

namespace App;

/**
 * This interface defines the contract that a class for creating the moves must adhere to
 * It can be extended to add new "Move" types.
 */
interface MoveFactoryInterface
{
    public function registerProvider(string $name, callable $callable): MoveFactoryInterface;
    
    public function getMove($name): Move;
}
