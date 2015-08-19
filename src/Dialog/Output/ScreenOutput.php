<?php
namespace Dialog\Output;

/**
 * The ScreenOutput implementation just echoes out the message (with a new line)
 */
class ScreenOutput implements OutputInterface
{
    /**
     * Processes and outputs the log message
     * 
     * @see \Dialog\Output\OutputInterface::output()
     */
    public function output($message)
    {
        echo $message . "\r\n";
    }
}