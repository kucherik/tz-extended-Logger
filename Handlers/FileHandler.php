<?php

namespace Logger\Handlers;

use Logger\Formatters\LineFormatter;

class FileHandler extends AbstractHandler
{
    protected $filename;

    /**
     * @var $formatter LineFormatter
     */
    protected $formatter;

    public function __construct($config = [])
    {
        parent::__construct($config);

        if (isset($config['filename'])) {
            $this->filename = $config['filename'];
        }
        else {
            throw new \Exception('filename is not set');
        }

        if (isset($config['formatter']) && $config['formatter'] instanceof LineFormatter) {
            $this->formatter = $config['formatter'];
        }
        else {
            throw new \Exception('formatter is not set');
        }
    }

    public function log(string $level, string $message)
    {
        if (!$this->isEnabled || !in_array($level, $this->levels)) {
            return null;
        }

        file_put_contents(
            $this->filename,
            $this->formatter->format($level, $message) . PHP_EOL,
            FILE_APPEND
        );
    }
}