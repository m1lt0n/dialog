<?php
namespace Dialog\Message;

interface EngineInterface
{
    public function interpolate($message, array $context);
}
