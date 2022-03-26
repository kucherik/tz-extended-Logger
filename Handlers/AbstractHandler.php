<?php

namespace Logger\Handlers;

use Logger\LogLevel;

abstract class AbstractHandler
{
    protected $isEnabled = true;

    protected $levels = [];

    public function __construct($config = [])
    {
        if (isset($config['is_enabled'])) {
            $this->setIsEnabled($config['is_enabled']);
        }

        if (isset($config['levels'])) {
            $this->setLevels($config['levels']);
        }
        else {
            $this->levels = LogLevel::getLevelList();
        }
    }

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

	public function setIsEnabled($value)
	{
		$this->isEnabled = (bool)$value;
	}

	protected function setLevels(array $levels)
	{
		$allowedLevels = LogLevel::getLevelList();

		foreach ($levels as $level) {
			if (!in_array($level, $allowedLevels)) {
				throw new \Exception('Invalid level: ' . $level);
			}

			$this->levels[] = $level;
		}
	}
}