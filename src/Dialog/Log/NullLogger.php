<?php
namespace Dialog\Log;

class NullLogger extends AbstractLogger
{
    public function log($level, $message, array $context = [])
    {
        // Check if level is allowed, or throw an InvalidArgumentException
        $this->isLevelAllowed($level);
        
        // do nothing
    }
}
