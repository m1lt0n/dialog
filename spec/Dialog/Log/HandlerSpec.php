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
        $this->beConstructedWith($formatter, $output);    
    }
    
    function it_implements_the_HandlerInterface()
    {
        $this->shouldHaveType('Dialog\Log\HandlerInterface');
    }
    
    function it_handles_the_message_properly_if_threshold_allows_it(
        FormatterInterface $formatter,
        OutputInterface $output)
    {
        $this->beConstructedWith($formatter, $output);
        $formatter->format('warning', 'my message')->willReturn('some message');
        $formatter->format('warning', 'my message')->shouldBeCalledTimes(1);
        $output->output('some message')->shouldBeCalledTimes(1);
        
        $this->handle(LogLevel::WARNING, 'my message');
    }

    function it_ignores_message_if_threshold_does_not_allow_it(
        FormatterInterface $formatter,
        OutputInterface $output)
    {
        $this->beConstructedWith($formatter, $output);
        $this->setThreshold(LogLevel::ERROR);
        $formatter->format(Argument::any(), Argument::any())->shouldNotBeCalled();
        $output->output(Argument::any())->shouldNotBeCalled();
        
        $this->handle(LogLevel::WARNING, 'my message');
    }
}
