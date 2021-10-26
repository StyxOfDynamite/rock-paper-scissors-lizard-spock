<?php

namespace App\Game\Moves;

/**
 * This interface defines the contract that a class for creating the moves must adhere to
 * It can be extended to add new "Move" types.
 */
interface MoveFactoryInterface
{
    public function registerMove(string $name, Move $move): MoveFactoryInterface;

    public function getMove(string $name): Move;

    public function getAvailableMoves(): array;
}
