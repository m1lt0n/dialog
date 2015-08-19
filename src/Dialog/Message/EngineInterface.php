<?php
namespace Dialog\Message;

/**
 * Implementors of the EngineInterface need to have an interpolate method
 * that accepts a message and an associative array with the expected placeholders
 * that need to be replaced in the message.
 */
interface EngineInterface
{
    /**
     * Interpolates variables/placeholders to their values in the message.
     * 
     * @param string $message the message
     * @param array $context the placeholders mapping
     * @return string the resulting string
     */
    public function interpolate($message, array $context);
}
