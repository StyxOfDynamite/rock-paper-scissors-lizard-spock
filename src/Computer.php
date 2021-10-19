<?php

namespace App;

class Computer extends Player
{

    public function __construct()
    {
        parent::__construct('Computer');
    }

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
