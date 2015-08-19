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
            $context[static::EXCEPTION_KEY] = $this->formattedExceptionString(
                $context[static::EXCEPTION_KEY]
            );
        }
        
        foreach ($context as $key => $value) {            
            $placeholdersMapping['{'. $key. '}'] = $value;            
        }
        
        return strtr($message, $placeholdersMapping);
    }
    
    /**
     * Returns a string representation of an Exception instance.
     * 
     * Example:
     * 
     * function getexception()
     * {
     *     return new \Exception('test message');
     * }
     * 
     * $e = getexception();
     * 
     * The output of the formattedExceptionString with $e passed to it would be
     * 
     * Message: test message Line: 3 File: blabla.php Trace: --some stack trace--
     * 
     * @param \Exception $e the Exception instance
     * @return string the formatted exception string
     */
    protected function formattedExceptionString(\Exception $e)
    {
        return "Message: {$e->getMessage()} Line: {$e->getLine()} ".
               "File: {$e->getFile()} Trace: {$e->getTraceAsString()}";
    }
}