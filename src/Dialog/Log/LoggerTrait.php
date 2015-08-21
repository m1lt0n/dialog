<?php
namespace Dialog\Log;

/**
 * A trait with a common implementation of the level specific log methods
 */
trait LoggerTrait
{
    /**
     * Emergency: system is unusable
     *
     * @param string $message the log message
     * @param array $context optional - the context including placeholders
     * @return null
     */
    public function emergency($message, array $context = [])
    {
        $this->log(LogLevel::EMERGENCY, $message, $context);
    }

    /**
     * Alert: action must be taken immediately
     *
     * @param string $message the log message
     * @param array $context optional - the context including placeholders
     * @return null
     */
    public function alert($message, array $context = [])
    {
        $this->log(LogLevel::ALERT, $message, $context);
    }

    /**
     * Critical: critical conditions
     *
     * @param string $message the log message
     * @param array $context optional - the context including placeholders
     * @return null
     */
    public function critical($message, array $context = [])
    {
        $this->log(LogLevel::CRITICAL, $message, $context);
    }
    
    /**
     * Error: error conditions
     *
     * @param string $message the log message
     * @param array $context optional - the context including placeholders
     * @return null
     */
    public function error($message, array $context = [])
    {
        $this->log(LogLevel::ERROR, $message, $context);
    }

    /**
     * Warning: warning conditions
     *
     * @param string $message the log message
     * @param array $context optional - the context including placeholders
     * @return null
     */
    public function warning($message, array $context = [])
    {
        $this->log(LogLevel::WARNING, $message, $context);
    }

    /**
     * Notice: normal but significant condition
     *
     * @param string $message the log message
     * @param array $context optional - the context including placeholders
     * @return null
     */
    public function notice($message, array $context = [])
    {
        $this->log(LogLevel::NOTICE, $message, $context);
    }
    
    /**
     * Informational: informational messages
     *
     * @param string $message the log message
     * @param array $context optional - the context including placeholders
     * @return null
     */
    public function info($message, array $context = [])
    {
        $this->log(LogLevel::INFO, $message, $context);
    }
    
    /**
     * Debug: debug-level messages
     *
     * @param string $message the log message
     * @param array $context optional - the context including placeholders
     * @return null
     */
    public function debug($message, array $context = [])
    {
        $this->log(LogLevel::DEBUG, $message, $context);
    }
    
    /**
     * Log with one of the allowed log levels.
     *
     * @param mixed $level the log level
     * @param string $message the log message
     * @param array $context optional - the context including placeholders
     * @return null
     */
    abstract public function log($level, $message, array $context = []);
    
    /**
     * Checks if the log level provided is a valid one according to the PSR-3
     * specification.
     *
     * @param string $level the level to check for validity
     */
    protected function isLevelAllowed($level)
    {
        return LogLevel::isValid($level);
    }
}
