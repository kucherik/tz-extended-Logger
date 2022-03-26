<?php

namespace Logger;

abstract class AbstractLogger
{
    abstract public function log(string $level, string $message);

    public function error(string $message)
    {
        $this->log(LogLevel::LEVEL_ERROR, $message);
    }

    public function info(string $message)
    {
        $this->log(LogLevel::LEVEL_INFO, $message);
    }

    public function debug(string $message)
    {
        $this->log(LogLevel::LEVEL_DEBUG, $message);
    }

    public function notice(string $message)
    {
        $this->log(LogLevel::LEVEL_NOTICE, $message);
    }
}