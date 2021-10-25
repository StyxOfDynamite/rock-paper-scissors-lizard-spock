<?php

namespace App\Game\Logging;

class ScreenLogger implements Logger
{
    public function log(string $line): void
    {
        print $line . PHP_EOL;
    }
}
