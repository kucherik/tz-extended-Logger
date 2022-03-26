<?php

namespace Logger\Handlers;

use Logger\LogLevel;

class SysLogHandler extends AbstractHandler
{
    public function log(string $level, string $message)
    {
        if (!$this->isEnabled || !in_array($level, $this->levels)) {
            return null;
        }

        syslog(LogLevel::getSysLog($level), $message);
    }
}
