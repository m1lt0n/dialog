<?php
namespace Dialog\Output;

/**
 * Implementors of the OutputInterface need to implement an output method
 * that accepts the $message string and process it (e.g. display on screen,
 * write in file etc)
 */
interface OutputInterface
{
    /**
     * Outputs/processes the log message
     * 
     * @param string $message the log message
     * @return null
     */
    public function output($message);
}