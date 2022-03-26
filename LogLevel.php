<?php

namespace Logger;

class LogLevel
{
    const LEVEL_ERROR = '001';
    const LEVEL_INFO = '002';
    const LEVEL_DEBUG = '003';
    const LEVEL_NOTICE = '004';

    protected static $labels = [
		self::LEVEL_ERROR => 'ERROR',
		self::LEVEL_INFO => 'INFO',
		self::LEVEL_DEBUG => 'DEBUG',
		self::LEVEL_NOTICE => 'NOTICE',
	];

	protected static $sysLogs = [
		self::LEVEL_ERROR => LOG_ERR,
		self::LEVEL_INFO => LOG_INFO,
		self::LEVEL_DEBUG => LOG_DEBUG,
		self::LEVEL_NOTICE => LOG_NOTICE,
	];

    public static function getLevelList()
    {
        return [
            self::LEVEL_ERROR,
            self::LEVEL_INFO,
            self::LEVEL_DEBUG,
            self::LEVEL_NOTICE,
        ];
    }

    public static function getLabel($value)
    {
		return self::$labels[$value];
    }

	public static function getSysLog($value)
	{
		return self::$sysLogs[$value];
	}
}