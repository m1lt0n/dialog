<?php
namespace Dialog\Log;

trait LoggerAwareTrait
{
    protected $logger;
    
    public function setLogger(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }
}