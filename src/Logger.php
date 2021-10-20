<?php

namespace App;

interface Logger
{
    public function log(string $line): void;
}
