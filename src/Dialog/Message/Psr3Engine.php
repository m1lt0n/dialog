<?php
namespace Dialog\Message;

/**
 * A PSR-3 compliant implementation of the EngineInterface.
 */
class Psr3Engine implements EngineInterface
{
    // Holds the exception key in the context to avoid hardcoding it
    const EXCEPTION_KEY = 'exception';

    /**
     * Holds an exception formatter instance
     * 
     * @var \Dialog\Message\ExceptionStringFormatterInterface
     */
    protected $exceptionFormatter;
    
    public function __construct(ExceptionStringFormatterInterface $exceptionFormatter)
    {
        $this->exceptionFormatter = $exceptionFormatter;   
    }
    
    /**
     * Interpolates a message replacing the context keys with values.
     * 
     * Example:
     * 
     * $message = 'This is a {animal}';
     * $context = ['animal' => 'Dog'];
     * 
     * The outcome of the interpolate method will be:
     * 
     * This is a Dog
     * 
     * @param string $message the message
     * @param array $context the variables mapping
     * @return string the resulting string
     * 
     * @see \Dialog\Message\EngineInterface::interpolate()
     */
    public function interpolate($message, array $context)
    {
        // Cast $message to string since objects with a __toString()
        // method can be passed, too
        $message = (string) $message;
        
        $placeholdersMapping = [];
        
        if (array_key_exists(static::EXCEPTION_KEY, $context)
            && $context[static::EXCEPTION_KEY] instanceof \Exception) {
            $context[static::EXCEPTION_KEY] = $this->exceptionFormatter->format(
                $context[static::EXCEPTION_KEY]
            );
        }
        
        foreach ($context as $key => $value) {            
            $placeholdersMapping['{'. $key. '}'] = $value;            
        }
        
        return strtr($message, $placeholdersMapping);
    }
}