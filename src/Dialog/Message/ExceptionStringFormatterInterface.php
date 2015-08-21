<?php
namespace Dialog\Message;

/**
 * Implementors will return a formatted string with the desired exception data
 */
interface ExceptionStringFormatterInterface
{
    /**
     * Returns a formatted string from an Exception instance
     *
     * @param \Exception $e
     * @return string the formatted exception string
     */
    public function format(\Exception $e);
    
    /**
     * The exception data to include in the formatting.
     *
     * @param array $data
     * @return null
     */
    public function setData(array $data);
}
