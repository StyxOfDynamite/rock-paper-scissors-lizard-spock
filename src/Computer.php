<?php

namespace App;

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
    public function __construct()
    {
        parent::__construct('Computer');
    }

    /**
     * chooseMove must be implmented by any subclass of Player.
     */
    public function chooseMove()
    {
        switch (rand(1, 3)) {
            case 1:
                return $this->moveFactory->createRock();
                break;
            case 2:
                return $this->moveFactory->createPaper();
                break;
            case 3:
                return $this->moveFactory->createScissors();
                break;
        }
    }
}
