<?php

namespace App;

use Exception;

/**
 * This class represnts a human player.
 * It is designed to build a new instance of a Player with a given name.
 * It is forced to implement the abstract method chooseMove().
 */

class Human extends Player
{

    public function __construct(string $name, LoggerFactoryInterface $loggerFactory)
    {
        parent::__construct($name, $loggerFactory);
    }

    /**
     * the class must implement how a move is chosen as this is
     * an abstract function in the parent class.
     */
    public function chooseMove()
    {
        $input = readline("Enter your move r/p/s/l/sp ?");
        switch ($input) {
            case 'r':
                return $this->moveFactory->createRock();
                break;
            case 'p':
                return $this->moveFactory->createPaper();
                break;
            case 's':
                return $this->moveFactory->createScissors();
                break;
            case 'l':
                return $this->moveFactory->createLizard();
                break;
            case 'sp':
                return $this->moveFactory->createSpock();
                break;
            default:
                // Only allows creation of valid moves, this could be moved into the factory
                throw new Exception('Invalid Move!');
        }
    }
}
