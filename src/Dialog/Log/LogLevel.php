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
    
    /**
     * Returns all the log levels as an array
     * 
     * @return array the log levels
     */
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
