<?php
namespace Dialog\Formatter;

/**
 * Interface for log line template engines
 */
interface TemplateEngineInterface
{
    /**
     * "Renders"/interpolates variables in the template
     * 
     * @param array $data the data/placeholder map
     * @return string the result
     */
    public function render(array $data = []);
    
    /**
     * Sets the template to be used
     * 
     * @param string $template the template
     * @return null
     */
    public function setTemplate($template);
    
    /**
     * Set the delimiters for placeholders
     * 
     * @param string $open opening delimiter
     * @param string $close closing delimiter
     * @return null
     */
    public function setDelimiters($open, $close);
}