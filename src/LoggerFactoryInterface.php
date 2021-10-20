<?php

namespace App;

interface LoggerFactoryInterface
{
    public function addProvider(string $name, callable $callable);

    public function provide(string $name);
}
