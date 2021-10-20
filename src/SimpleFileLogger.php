<?php

namespace App;

class SimpleFileLogger implements Logger
{
    private $filePath;

    public function __construct($filePath)
    {
        $this->filePath = $filePath;
    }

    public function log(string $line): void
    {
        file_put_contents($this->filePath, $line, FILE_APPEND);
    }
}
