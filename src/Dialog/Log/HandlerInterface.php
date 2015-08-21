<?php
namespace Dialog\Log;

/**
 * Holds a log message handler
 */
interface HandlerInterface
{
    /**
     * Handles the log message
     *
     * @param string $level the log level
     * @param string $message the message
     */
    public function handle($level, $message);
}
