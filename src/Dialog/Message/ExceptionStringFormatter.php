<?php
namespace Dialog\Message;

/**
 * An Exception's string formatter to be used with a MessageEngine
 */
class ExceptionStringFormatter implements ExceptionStringFormatterInterface
{
    /**
     * Holds the data that will be formatted (array with labels => data)
     * 
     * @var array
     */
    protected $data = ['Message' => 'message', 'Trace' => 'traceAsString'];
    
    /**
     * Return a formatted representation of the Exception
     * 
     * @param \Exception $e the Exception
     * @return string the formatted exception string
     * 
     * @see \Dialog\Message\ExceptionStringFormatterInterface::format()
     */
    public function format(\Exception $e)
    {
        $result = [];
        foreach ($this->data as $label => $value) {
            $getter = $this->getGetter($value);
            $result[] = "{$label}: {$e->$getter()}";
        }

        return implode(' ', $result);
    }
    
    /**
     * Set the data to be included in the exception. The convention is to
     * have the exception's getter method without the get prefix.
     * 
     * Example:
     * 
     * ['Message' => 'message'] will use getMessage() getter in format method
     * (see getGetter method).
     * 
     * @param array $data the data - an assoc array with labels and values
     * @return null
     * 
     * @see \Dialog\Message\ExceptionStringFormatterInterface::setData()
     */
    public function setData(array $data)
    {
        $this->data = $data;
    }
    
    /**
     * Get the getter method from a property. the convention
     * 
     * @param unknown $property
     */
    protected function getGetter($property)
    {
        $property = ucfirst($property);
        return "get{$property}";
    }
}