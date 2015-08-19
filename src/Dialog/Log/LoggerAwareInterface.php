<?php
namespace Dialog\Log;

/**
 * Implementors of the LoggerAwareInterface need to have a setLogger method
 * that accepts a LoggerInterface instance.
 */
interface LoggerAwareInterface
{
    /**
     * Set the logger instance.
     * 
     * @param LoggerInterface $logger the logger
     * @return null
     */
    public function setLogger(LoggerInterface $logger);
}
