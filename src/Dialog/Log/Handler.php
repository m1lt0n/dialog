<?php
namespace Dialog\Log;

use Dialog\Formatter\FormatterInterface;
use Dialog\Output\OutputInterface;

/**
 * A Generic implementation of the HandlerInterface
 */
class Handler implements HandlerInterface
{
    /**
     * Holds the minimum threshold for triggering the handling
     * 
     * @var unknown
     */
    protected $threshold = LogLevel::INFO;
    
    /**
     * Holds a FormatterInterface instance
     * @var \Dialog\Formatter\FormatterInterface
     */
    protected $formatter;
    
    /**
     * Holds an OutputInterface instance
     * @var \Dialog\Output\OutputInterface
     */
    protected $output;
    
    public function __construct(FormatterInterface $formatter, OutputInterface $output)
    {
        $this->formatter = $formatter;
        $this->output = $output;
    }
    
    public function setThreshold($threshold)
    {
        $this->threshold = $threshold;    
    }
    
    /**
     * Handle the log message
     * 
     * @see \Dialog\Log\HandlerInterface::handle()
     */
    public function handle($level, $message)
    {
        if (!$this->shouldBeHandled($level)) {
            return;
        }
        
        // Format the message
        $message = $this->formatter->format(LogLevel::getLabel($level), $message);
        
        // Output/process the formatted message
        $this->output->output($message);
    }
    
    /**
     * Should a level be handled?
     * 
     * @param string $level the log level to check
     * @return boolean whether the level should be handled
     */
    protected function shouldBeHandled($level)
    {
        return LogLevel::getPriority($level) >= LogLevel::getPriority($this->threshold);
    }
}