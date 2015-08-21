<?php

namespace spec\Dialog\Log;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Dialog\Message\EngineInterface;
use Dialog\Log\HandlerBagInterface;
use Dialog\Log\HandlerInterface;
use Dialog\Log\HandlerBag;
use Dialog\Log\LogLevel;

class LoggerSpec extends ObjectBehavior
{
    function let(
        EngineInterface $interpolator,
        HandlerBagInterface $handlerBag,
        HandlerInterface $h1,
        HandlerInterface $h2)
    {
        $this->beConstructedWith($interpolator, $handlerBag);  
    }
    
    function it_implements_theLoggerInterface()
    {
        $this->shouldHaveType('Dialog\Log\LoggerInterface');
    }
    
    function it_throws_exception_with_invalid_log_level()
    {
        $this->shouldThrow('\Dialog\Log\InvalidArgumentException')->duringLog('bla', 'message');
    }
    
    function it_goes_through_all_registered_handlers(
        EngineInterface $interpolator,
        HandlerBagInterface $handlerBag,
        HandlerInterface $h1,
        HandlerInterface $h2)
    {
        $handlerBag->handlers()->willReturn(compact('h1', 'h2'));
        $this->beConstructedWith($interpolator, $handlerBag);
        
        $interpolator->interpolate('some message', [])->willReturn('interpolated!');
        $interpolator->interpolate('some message', [])->shouldBeCalledTimes(1);
        $h1->handle(LogLevel::WARNING, 'interpolated!')->shouldBeCalledTimes(1);
        $h2->handle(LogLevel::WARNING, 'interpolated!')->shouldBeCalledTimes(1);
        $this->log(LogLevel::WARNING, 'some message');
    }
}
