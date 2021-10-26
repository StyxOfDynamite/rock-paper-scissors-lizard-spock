<?php

namespace App\Game\Moves;

use Exception;

/**
 * This Factory returns concrete implementations of the available moves.
 * If the Interface added new moves, they would have to be implemented here.
 */
class MoveFactory implements MoveFactoryInterface
{
    private $moves = [];
    private $providers = [];

    public function registerMove($name, $move): MoveFactoryInterface
    {
        $this->moves[$name] = $move;
        return $this;
    }

    public function getMove($name): Move
    {
        if (array_key_exists($name, $this->moves) === false) {
            throw new Exception("Invalid Move", 1);
        }
        return $this->moves[$name];
    }

    public function getAvailableMoves(): array
    {
        return array_filter($this->moves, function (Move $item) {
            return $item->getProbability() >= random_int(1, 100);
        });
    }
}
