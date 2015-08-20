<?php

namespace spec\Dialog\Formatter;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Dialog\Log\LogLevel;
use Dialog\Formatter\DateTimeBuilderInterface;
use Dialog\Formatter\TemplateEngine;

class FormatterSpec extends ObjectBehavior
{
    function let(DateTimeBuilderInterface $builder)
    {
        $this->beConstructedWith($builder, new TemplateEngine());
        $builder->buildFromTime()->willReturn('DATE');
    }
    
    function it_implements_the_FormatterInterface()
    {
        $this->shouldHaveType('Dialog\Formatter\FormatterInterface');
    }
    
    function it_renders_properly_with_string_message()
    {
        $this->format('warning', 'a warning')->shouldReturn('DATE WARNING a warning');
    }
}
