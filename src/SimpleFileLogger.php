<?php

namespace App;

class SimpleFileLogger
{
    private $filePath;

    public function __construct($filePath)
    {
        $this->filePath = $filePath;
    }

    public function log(string $line)
    {
        file_put_contents($this->filePath, $line, FILE_APPEND);
    }
}
