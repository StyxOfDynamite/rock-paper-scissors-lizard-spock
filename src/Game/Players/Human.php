<?php

namespace App\Game\Players;

use App\Game\Logging\LoggerFactoryInterface;
use App\Game\Moves\MoveFactoryInterface;
use Exception;

/**
 * This class represnts a human player.
 * It is designed to build a new instance of a Player with a given name.
 * It is forced to implement the abstract method chooseMove().
 */

class Human extends Player
{

    public function __construct(string $name, MoveFactoryInterface $moveFactory)
    {
        parent::__construct($name, $moveFactory);
    }

    /**
     * the class must implement how a move is chosen as this is
     * an abstract function in the parent class.
     */
    public function chooseMove()
    {
        $input = readline("Enter your move rock/paper/scissors/lizard/spock/bomb ?");
        return $this->moveFactory->getMove($input);
    }
}
