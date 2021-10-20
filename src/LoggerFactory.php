<?php

namespace App;

class LoggerFactory implements LoggerFactoryInterface
{

    private $loggers = [];
    private $providers = [];

    public function addProvider(string $name, callable $provider)
    {
        $this->providers[$name] = $provider;
        return $this;
    }

    public function provide(string $name)
    {
        if (array_key_exists($name, $this->loggers) === false) {
            $this->loggers[$name] = call_user_func($this->providers[$name]);
        }
        return $this->loggers[$name];
    }
}
