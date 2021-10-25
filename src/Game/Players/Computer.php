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
        if (rand(1, 100) === 36) {
            return $this->moveFactory->getMove('bomb');
        }

        switch (rand(1, 5)) {
            case 1:
                return $this->moveFactory->getMove('rock');
                break;
            case 2:
                return $this->moveFactory->getMove('paper');
                break;
            case 3:
                return $this->moveFactory->getMove('scissors');
                break;
            case 4:
                return $this->moveFactory->getMove('lizard');
                break;
            case 5:
                return $this->moveFactory->getMove('spock');
                break;
        }
    }
}
