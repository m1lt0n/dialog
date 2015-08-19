<?php
namespace Dialog\Formatter;

/**
 * This is a basic implementation of the FormatterInterface. The formatting
 * process adds a timezone aware datetime string and an uppercase version of the
 * log level before the message. 
 */
class BaseFormatter implements FormatterInterface
{
    /**
     * Holds the timezone used in the DateTimes prepended to the message 
     * @var string
     */
    protected $timezone = 'UTC';
    
    /**
     * Holds the format of the DateTime
     * 
     * @var string
     */
    protected $dateTimeFormat = 'Y-m-d H:i:s O';
    
    /**
     * A basic template string where placeholders are put in the order desired
     * 
     * @var string
     */
    protected $template = 'date level message';
    
    /**
     * Format the log message. Prepends a DateTime formatted string and the
     * log level to the message.
     * 
     * Example:
     * 
     * $formatter = new BaseFormatter();
     * $formatter->format(LogLevel::WARNING, 'This is a warning');
     * 
     * The above returns:
     * 
     * 2015-08-19 14:31 +0300 WARNING This is a warning
     * 
     * @param string $level the log level
     * @param string $message the log message
     * @return string the formatted message
     * 
     * @see \Dialog\Formatter\FormatterInterface::format()
     */
    public function format($level, $message)
    {
        $date = new \DateTime(null, new \DateTimeZone($this->timezone));
        $date = $date->format($this->dateTimeFormat);
        $level = strtoupper($level);
        
        return $this->populateTemplate(compact('date', 'level', 'message'));
    }
    
    /**
     * Set the timezone for the datetime of the log line
     * 
     * @param string $timezone the timezone
     * @return null
     */
    public function setTimezone($timezone)
    {
        $this->timezone = $timezone;
    }
    
    /**
     * Set the DateTime format (e.g. 'Y-m-d')
     * 
     * @param string $dateTimeFormat the string format
     * @return null
     */
    public function setDateTimeFormat($dateTimeFormat)
    {
        $this->dateTimeFormat = $dateTimeFormat;
    }
    
    /**
     * Set the template (e.g. 'date message')
     * 
     * @param string $template the template string
     * @return null
     */
    public function setTemplate($template)
    {
        $this->template = $template;    
    }
    
    /**
     * Uses the BaseFormatter::$template structure and replaces occurrences of
     * $data keys with their actual values
     * 
     * @param array $data the template data needed
     * @return string the template with its actual values
     */
    protected function populateTemplate(array $data)
    {
        return strtr($this->template, $data);
    }
}