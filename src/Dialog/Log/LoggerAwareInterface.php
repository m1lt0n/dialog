<?php
namespace Dialog\Log;

interface LoggerAwareInterface
{
    public function setLogger(LoggerInterface $logger);
}
