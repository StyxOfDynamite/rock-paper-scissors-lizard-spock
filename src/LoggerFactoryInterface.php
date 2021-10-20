<?php

namespace App;

interface LoggerFactoryInterface
{
    public function addProvider(string $name, callable $callable): LoggerFactoryInterface;

    public function provide(string $name): Logger;
}
