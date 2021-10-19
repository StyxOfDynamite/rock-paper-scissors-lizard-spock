<?php

namespace App;

use Exception;

class Human extends Player
{
    protected $moveFactory;
    
    public function __construct(string $name = 'Player')
    {
        parent::__construct($name);
    }

    public function chooseMove()
    {
        $input = readline("Enter your move r/p/s ?");
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
            default:
                throw new Exception('Invalid Move!');
        }
    }
}
