<?php
namespace Dialog\Formatter;

/**
 * This is a basic implementation of the FormatterInterface. The formatting
 * process adds a timezone aware datetime string and an uppercase version of the
 * log level before the message. 
 */
class Formatter implements FormatterInterface
{
    /**
     * Holds the Datebuilder for building timestamps in the log line
     * 
     * @var \Dialog\Formatter\DateTimeBuilderInterface
     */
    protected $dateBuilder;
    
    /**
     * Holds the template engine 
     * 
     * @var unknown
     */
    protected $templateEngine;
    
    public function __construct(DateTimeBuilderInterface $dateBuilder, TemplateEngineInterface $templateEngine)
    {
        $this->dateBuilder = $dateBuilder;
        $this->templateEngine = $templateEngine;
    }
    
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
        $date = $this->dateBuilder->buildFromTime();
        $level = strtoupper($level);
        
        return $this->templateEngine->render(compact('date', 'level', 'message'));
    }
}