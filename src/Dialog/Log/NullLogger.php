<?php
namespace Dialog\Log;

/**
 * A black hole implementation of the logger
 */
class NullLogger extends AbstractLogger
{
    /**
     * The log method does actually nothing, apart from checking for the validity
     * of the log level according to the PSR-3 specification.
     *
     * @param string $level the log level
     * @param string $message the message
     * @param array $context the message's context/placeholders
     * @return null
     *
     * @see \Dialog\Log\LoggerInterface::log()
     */
    public function log($level, $message, array $context = [])
    {
        // Check if level is allowed, or throw an InvalidArgumentException
        $this->isLevelAllowed($level);
        
        // do nothing
    }
}
