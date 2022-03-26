<?php

namespace Logger;

use Logger\Handlers\AbstractHandler;

class Logger extends AbstractLogger
{
    /**
     * @var $handlers AbstractHandler[]
     */
    protected $handlers = [];

    public function log(string $level, string $message)
    {
        foreach ($this->handlers as $handler) {
            $handler->log($level, $message);
        }
    }

    public function addHandler(AbstractHandler $handler)
    {
        $this->handlers[] = $handler;
    }
}