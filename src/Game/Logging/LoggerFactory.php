<?php

namespace App\Game\Logging;

class LoggerFactory implements LoggerFactoryInterface
{

    private $loggers = [];
    private $providers = [];

    public function addProvider(string $name, callable $provider): LoggerFactoryInterface
    {
        $this->providers[$name] = $provider;
        return $this;
    }

    public function provide(string $name): Logger
    {
        if (array_key_exists($name, $this->loggers) === false) {
            $this->loggers[$name] = call_user_func($this->providers[$name]);
        }
        return $this->loggers[$name];
    }
}
