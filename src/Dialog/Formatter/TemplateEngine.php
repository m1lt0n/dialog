<?php
namespace Dialog\Formatter;

class TemplateEngine implements TemplateEngineInterface
{
    /**
     * A basic template string where placeholders are put in the order desired
     *
     * @var string
     */
    protected $template = '{date} {level} {message}';
    
    /**
     * The default template delimiters
     *
     * @var array
     */
    protected $delimiters = ['{', '}'];
    
    /**
     * Replaces placeholders with their actual data and returns the result
     *
     * @param array $data optional - the data/placeholder map
     * @return string the result
     *
     * @see \Dialog\Formatter\TemplateEngineInterface::render()
     */
    public function render(array $data = [])
    {
        $delimitedData = [];
        
        foreach ($data as $key => $value) {
            $delimitedData[$this->delimiters[0] . $key . $this->delimiters[1]] = $value;
        }
        
        return strtr($this->template, $delimitedData);
    }
    
    /**
     * Set the template to be used
     *
     * @param string $template
     * @return null
     *
     * @see \Dialog\Formatter\TemplateEngineInterface::setTemplate()
     */
    public function setTemplate($template)
    {
        $this->template = $template;
    }
    
    /**
     * Set the template delimiters
     *
     * @param string $open opening delimiter
     * @param string $close closing delimiter
     * @return null
     *
     * @see \Dialog\Formatter\TemplateEngineInterface::setDelimiters()
     */
    public function setDelimiters($open, $close)
    {
        $this->delimiters = [$open, $close];
    }
}
