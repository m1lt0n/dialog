<?php
namespace Dialog\Log;

/**
 * Specifies the interface a PSR-3 compliant Logger should implement.
 *
 * According to RFC-5424, the log levels are 8:
 *  - Emergency: system is unusable
 *  - Alert: action must be taken immediately
 *  - Critical: critical conditions
 *  - Error: error conditions
 *  - Warning: warning conditions
 *  - Notice: normal but significant condition
 *  - Informational: informational messages
 *  - Debug: debug-level messages
 *
 * The message passed to all methods must be a string or an object
 * implementing __toString().
 *
 * The message can contain placeholders in the form of {key}, where key should
 * be a key of the context array. The only assumption for keys of context is
 * that if an exception needs to be passed in order to produce a stack trace,
 * it should reside in a key named 'exception'.
 */
interface LoggerInterface
{
    /**
     * Emergency: system is unusable
     *
     * @param string $message the log message
     * @param array $context optional - the context including placeholders
     * @return null
     */
    public function emergency($message, array $context = []);

    /**
     * Alert: action must be taken immediately
     *
     * @param string $message the log message
     * @param array $context optional - the context including placeholders
     * @return null
     */
    public function alert($message, array $context = []);

    /**
     * Critical: critical conditions
     *
     * @param string $message the log message
     * @param array $context optional - the context including placeholders
     * @return null
     */
    public function critical($message, array $context = []);

    /**
     * Error: error conditions
     *
     * @param string $message the log message
     * @param array $context optional - the context including placeholders
     * @return null
     */
    public function error($message, array $context = []);

    /**
     * Warning: warning conditions
     *
     * @param string $message the log message
     * @param array $context optional - the context including placeholders
     * @return null
     */
    public function warning($message, array $context = []);

    /**
     * Notice: normal but significant condition
     *
     * @param string $message the log message
     * @param array $context optional - the context including placeholders
     * @return null
     */
    public function notice($message, array $context = []);

    /**
     * Informational: informational messages
     *
     * @param string $message the log message
     * @param array $context optional - the context including placeholders
     * @return null
     */
    public function info($message, array $context = []);

    /**
     * Debug: debug-level messages
     *
     * @param string $message the log message
     * @param array $context optional - the context including placeholders
     * @return null
     */
    public function debug($message, array $context = []);

    /**
     * Log with one of the allowed log levels.
     *
     * @param mixed $level the log level
     * @param string $message the log message
     * @param array $context optional - the context including placeholders
     * @return null
     */
    public function log($level, $message, array $context = []);
}
