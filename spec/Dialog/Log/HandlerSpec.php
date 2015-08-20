<?php

namespace spec\Dialog\Log;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Dialog\Formatter\FormatterInterface;
use Dialog\Output\OutputInterface;
use Dialog\Log\LogLevel;

class HandlerSpec extends ObjectBehavior
{
    function let(FormatterInterface $formatter, OutputInterface $output)
    {
        $formatter->format(LogLevel::WARNING, 'a message')->willReturn('some message');
        $this->beConstructedWith($formatter, $output);    
    }
    
    function it_implements_the_HandlerInterface()
    {
        $this->shouldHaveType('Dialog\Log\HandlerInterface');
    }
}
