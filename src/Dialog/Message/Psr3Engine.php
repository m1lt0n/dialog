<?php
namespace Dialog\Message;

class Psr3Engine implements EngineInterface
{
    const EXCEPTION_KEY = 'exception';
    
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
    
    protected function formattedExceptionString(\Exception $e)
    {
        return "Message: {$e->getMessage()} Line: {$e->getLine()} ".
               "File: {$e->getFile()} Trace: {$e->getTraceAsString()}";
    }
}