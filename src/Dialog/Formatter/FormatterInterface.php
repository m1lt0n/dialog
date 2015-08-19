<?php
namespace Dialog\Formatter;

interface FormatterInterface
{
    public function format($level, $message);
}