<?php

namespace App;

interface Factory
{
    public function createRock(): Rock;

    public function createPaper(): Paper;

    public function createScissors(): Scissors;
}
