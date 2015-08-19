<?php
namespace Dialog\Formatter;

class BaseFormatter implements FormatterInterface
{
    protected $timezone;
    protected $dateTimeFormat;
    protected $template;
    
    public function __construct()
    {
        $this->timezone = 'UTC';
        $this->dateTimeFormat = 'Y-m-d H:i:s O';
        $this->template = 'date level message';
    }
    
    public function format($level, $message)
    {
        $date = new \DateTime(null, new \DateTimeZone($this->timezone));
        $date = $date->format($this->dateTimeFormat);
        $level = strtoupper($level);
        
        return $this->populateTemplate(compact('date', 'level', 'message'));
    }
    
    public function setTimezone($timezone)
    {
        $this->timezone = $timezone;
    }
    
    public function setDateTimeFormat($dateTimeFormat)
    {
        $this->dateTimeFormat = $dateTimeFormat;
    }
    
    public function setTemplate($template)
    {
        $this->template = $template;    
    }
    
    protected function populateTemplate(array $data)
    {
        return strtr($this->template, $data);
    }
}