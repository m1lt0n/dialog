<?php

namespace spec\Dialog\Message;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Dialog\Message\ExceptionStringFormatterInterface;

class Psr3EngineSpec extends ObjectBehavior
{
    function let(ExceptionStringFormatterInterface $exceptionFormatter)
    {
        $exceptionFormatter->format(Argument::any())->willReturn('exceptional!');
        $this->beConstructedWith($exceptionFormatter);
    }
    
    function it_implements_the_EngineInterface()
    {
        $this->shouldHaveType('Dialog\Message\EngineInterface');
    }
    
    function it_interpolates_properly()
    {
        $message = 'Hello {name}, this is some {inexistent} thing {exception}';
        
        $context = ['name' => 'Pantelis', 'exception' => new \Exception('exceptional!')];
        $this->interpolate($message, $context)
             ->shouldReturn('Hello Pantelis, this is some {inexistent} thing exceptional!');
    }
}
