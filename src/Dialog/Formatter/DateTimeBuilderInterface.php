<?php
namespace Dialog\Formatter;

/**
 * Interface for builders of a DateTime string
 * formatted and timezone aware
 */
interface DateTimeBuilderInterface
{
    /**
     * Build a DateTime string for a $time string.
     * If $time is not specified, the current time
     * is used
     *
     * @param string $time the acceptable time strings for DateTime
     * @return string a datetime string
     */
    public function buildFromTime($time = null);
    
    /**
     * Sets the timezone to be used for building the string
     *
     * @param string $timezone the timezone
     * @return null
     */
    public function setTimezone($timezone);
    
    /**
     * Sets the datetime format
     *
     * @param string $format
     * @return null
     */
    public function setDateTimeFormat($format);
}
