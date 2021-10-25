<?php

namespace App\Game\Logging;

interface LoggerFactoryInterface
{
    public function addProvider(string $name, callable $callable): LoggerFactoryInterface;

    public function provide(string $name): Logger;
}
