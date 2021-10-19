<?php

namespace App;

interface Turn
{
    public function beats(Move $move);
    public function loses(Move $move);
    public function draws(Move $move);
}
