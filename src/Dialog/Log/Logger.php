<?php
namespace Dialog\Log;

use Dialog\Message\EngineInterface;
use Dialog\Formatter\FormatterInterface;
use Dialog\Output\OutputInterface;
use Dialog\Log\AbstractLogger;

/**
 * A generic implementation of the AbstractLogger. Depends on 
 */
class Logger extends AbstractLogger
{
    /**
     * Holds the message interpolation service
     * @var \Dialog\Message\EngineInterface
     */
    protected $interpolator;
    
    /**
     * Holds the message formatter service
     * @var \Dialog\Formatter\FormatterInterface
     */
    protected $formatter;
    
    /**
     * Holds the actual logging service
     * @var \Dialog\Output\OutputInterface
     */
    protected $output;
    
    public function __construct(
        EngineInterface $interpolator,
        HandlerBagInterface $handlerBag)
    {
        $this->interpolator = $interpolator;
        $this->handlerBag = $handlerBag;
    }
    
    /**
     * The generic log method. First verifies the log level's validity and then
     * interpolates and formats the message and processes it (passes it to all
     * of the registered handlers for the logger)
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
    
        // interpolate the message
        $message = $this->interpolator->interpolate($message, $context);
        
        foreach ($this->handlerBag->handlers() as $handler) {
            $handler->handle($level, $message);
        }
    }
}