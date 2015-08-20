<?php
namespace Dialog\Formatter;

class DateTimeBuilder implements DateTimeBuilderInterface
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
     * Build the DateTime string, timezone aware with the format
     * specified by setDateTimeFormat. If no time is provided,
     * the current one is used
     * 
     * @param string $time optional - a time string
     * @return string the DateTime string
     *  
     * @see \Dialog\Formatter\DateTimeBuilderInterface::buildFromTime()
     */
    public function buildFromTime($time = null)
    {
        $timezone = new \DateTimeZone($this->timezone);
        $date = new \DateTime($time, $timezone);
    
        return $date->format($this->dateTimeFormat);
    }
    
    /**
     * Set the datetime format
     * 
     * @param string $format
     * @return null
     * 
     * @see \Dialog\Formatter\DateTimeBuilderInterface::setDateTimeFormat()
     */
    public function setDateTimeFormat($format)
    {
        $this->dateTimeFormat = $format;
    }
    
    /**
     * Set the timezone
     * 
     * @param string $timezone
     * @return null
     * 
     * @see \Dialog\Formatter\DateTimeBuilderInterface::setTimezone()
     */
    public function setTimezone($timezone)
    {
        $this->timezone = $timezone;
    }
}