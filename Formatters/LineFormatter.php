<?php

namespace Logger\Formatters;

use Logger\LogLevel;

class LineFormatter
{
    protected $pattern;

    protected $dateFormat;

    public function __construct(
        $pattern = '%date%  [%level_code%]  [%level%]  %message%',
        $dateFormat = 'Y-m-d H:i:s'
    )
    {
        $this->pattern = $pattern;
        $this->dateFormat = $dateFormat;
    }

    public function format(string $level, string $message)
    {
        $replace = [
            '%date%' => date($this->dateFormat),
            '%level_code%' => $level,
            '%level%' => LogLevel::getLabel($level),
            '%message%' => $message,
        ];

        return str_replace(array_keys($replace), array_values($replace), $this->pattern);
    }
}