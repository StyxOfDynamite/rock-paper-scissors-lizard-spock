<?php

namespace App\Game\Logging;

interface Logger
{
    public function log(string $line): void;
}
