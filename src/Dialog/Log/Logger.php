<?php
namespace Dialog\Log;

use Dialog\Message\EngineInterface;
use Dialog\Formatter\FormatterInterface;
use Dialog\Output\OutputInterface;
use Dialog\Log\AbstractLogger;

class Logger extends AbstractLogger
{
    protected $interpolator;
    protected $formatter;
    protected $output;
    
    public function __construct(
        EngineInterface $interpolator,
        FormatterInterface $formatter,
        OutputInterface $output)
    {
        $this->interpolator = $interpolator;
        $this->formatter = $formatter;
        $this->output = $output;
    }
    
    public function log($level, $message, array $context = [])
    {
        // Check if level is allowed, or throw an InvalidArgumentException
        $this->isLevelAllowed($level);
    
        // interpolate the message
        $message = $this->interpolator->interpolate($message, $context);
        
        // format and add DateTimes etc
        $message = $this->formatter->format($level, $message);
        
        // output to the appropriate place
        $this->output->output($message);
    }
}