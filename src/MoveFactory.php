<?php

namespace App;

use Exception;

/**
 * This Factory returns concrete implementations of the available moves.
 * If the Interface added new moves, they would have to be implemented here.
 */
class MoveFactory implements MoveFactoryInterface
{
    private $moves = [];
    private $providers = [];

    public function registerMove($name, $callable): MoveFactoryInterface
    {
        $this->providers[$name] = $callable;
        return $this;
    }

    public function getMove($name): Move
    {
        if (array_key_exists($name, $this->moves) === false) {
            if (isset($this->providers[$name])) {
                $this->moves[$name] = call_user_func($this->providers[$name]);
            } else {
                throw new Exception("Invalid Move");
            }
        }
        return $this->moves[$name];
    }
}
