<?php

namespace spec\Dialog\Message;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class Psr3EngineSpec extends ObjectBehavior
{
    function it_implements_the_EngineInterface()
    {
        $this->shouldHaveType('Dialog\Message\EngineInterface');
    }
    
    function it_interpolates_properly()
    {
        $message = 'Hello {name}, this is some {inexistent} thing';
        
        $context = ['name' => 'Pantelis'];
        $this->interpolate($message, $context)
             ->shouldReturn('Hello Pantelis, this is some {inexistent} thing');
    }
}
