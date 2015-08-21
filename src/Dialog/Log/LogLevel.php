<?php
namespace Dialog\Log;

/**
 * All the different log levels
 */
class LogLevel
{
    const EMERGENCY = 80;
    const ALERT = 70;
    const CRITICAL = 60;
    const ERROR = 50;
    const WARNING = 40;
    const NOTICE = 30;
    const INFO = 20;
    const DEBUG = 10;
    
    /**
     * Return the label of a log level
     *
     * @param integer $level the log level
     * @return string the log level label
     */
    public static function getLabel($level)
    {
        $levels = static::all();
        if (!static::isValid($level)) {
            throw new InvalidArgumentException('Invalid log level provided');
        }
        
        return $levels[$level];
    }
    
    /**
     * Return the priority of the log level (same as its value)
     *
     * @param integer $level the log level
     * @return integer the log level priority
     */
    public static function getPriority($level)
    {
        if (!static::isValid($level)) {
            throw new InvalidArgumentException('Invalid log level provided');
        }
        
        return $level;
    }

    /**
     * Return if a level is a valid log level
     *
     * @param integer $level the level
     * @return boolean whether it is a valid level or no
     */
    public static function isValid($level)
    {
        $levels = static::all();
        $levelsKeys = array_keys($levels);
        
        return in_array($level, $levelsKeys);
    }
    
    /**
     * Returns all the log levels as an array
     *
     * @return array the log levels
     */
    protected static function all()
    {
        return [
            static::EMERGENCY => 'emergency',
            static::ALERT => 'alert',
            static::CRITICAL => 'critical',
            static::ERROR => 'error',
            static::WARNING => 'warning',
            static::NOTICE => 'notice',
            static::INFO => 'info',
            static::DEBUG => 'debug',
        ];
    }
}
