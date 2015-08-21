<?php

namespace spec\Dialog\Message;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ExceptionStringFormatterSpec extends ObjectBehavior
{
    function it_implements_the_ExceptionStringFormatterInterface()
    {
        $this->shouldHaveType('Dialog\Message\ExceptionStringFormatterInterface');
    }
    
    function it_formats_exception_with_given_data()
    {
        $this->setData(['Message' => 'message']);
        $this->format(new \Exception('wow!'))->shouldReturn('Message: wow!');
    }
}
