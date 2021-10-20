<?php

namespace App;

class ScreenLogger implements Logger
{
    public function log(string $line): void
    {
        print $line;
    }
}
