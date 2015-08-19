<?php
namespace Dialog\Log;

/**
 * A trait with a common implementation of the setLogger method
 */
trait LoggerAwareTrait
{
    /**
     * Holds the logger instance
     * @var \Dialog\Log\LoggerInterface
     */
    protected $logger;
    
    /**
     * Set the logger instance
     * 
     * @param LoggerInterface $logger the logger
     * @return null
     */
    public function setLogger(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }
}