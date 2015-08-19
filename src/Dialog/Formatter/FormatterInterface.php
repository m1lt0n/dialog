<?php
namespace Dialog\Formatter;

/**
 * Implementors of the FormatterInterface should implement just a format
 * method that accepts the log level and message and format it as they want.  
 */
interface FormatterInterface
{
    /**
     * Format a given message with a given log level.
     * 
     * @param string $level the log level
     * @param string $message the log message
     * 
     * @return string the formatted message
     */
    public function format($level, $message);
}