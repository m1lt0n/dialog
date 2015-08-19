<?php
namespace Dialog\Output;

class ScreenOutput implements OutputInterface
{
    public function output($message)
    {
        echo $message . "\r\n";
    }
}