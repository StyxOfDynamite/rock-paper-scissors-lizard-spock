<?php

namespace App\Game\Players;

use App\Game\Moves\MoveFactoryInterface;

/**
 * This class represnts a computer player.
 * It is hardcoded to instansiate an player isntance with the name Computer.
 * It is forced to implement the abstract method chooseMove().
 */
class Computer extends Player
{
    /**
     * Creates a new Player with the name Computer
     */
    public function __construct(MoveFactoryInterface $moveFactory)
    {
        parent::__construct('Computer', $moveFactory);
    }

    /**
     * chooseMove must be implmented by any subclass of Player.
     */
    public function chooseMove()
    {
        return $this->getMoveFactory()->getMove(array_rand($this->getMoveFactory()->getAvailableMoves()));
    }
}
