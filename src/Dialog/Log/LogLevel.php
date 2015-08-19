<?php
namespace Dialog\Log;

/**
 * All the different log levels 
 */
class LogLevel
{
    const EMERGENCY = 'emergency';
    const ALERT = 'alert';
    const CRITICAL = 'critical';
    const ERROR = 'error';
    const WARNING = 'warning';
    const NOTICE = 'notice';
    const INFO = 'info';
    const DEBUG = 'debug';
    
    public static function all()
    {
        return [
            static::EMERGENCY,
            static::ALERT,
            static::CRITICAL,
            static::ERROR,
            static::WARNING,
            static::NOTICE,
            static::INFO,
            static::DEBUG,
        ];
    }
}
