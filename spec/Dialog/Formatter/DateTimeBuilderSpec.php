<?php

namespace spec\Dialog\Formatter;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class DateTimeBuilderSpec extends ObjectBehavior
{
    function it_implements_the_DateTimeBuilderInterface()
    {
        $this->shouldHaveType('Dialog\Formatter\DateTimeBuilderInterface');
    }
    
    function it_honors_defaults_when_building()
    {
        $this->buildFromTime('2008:08:07 18:11:31')->shouldReturn('2008-08-07 18:11:31 +0000');
    }
    
    function it_properly_sets_timezone()
    {
        $this->setTimezone('Europe/Athens');
        $this->buildFromTime('2008:08:07 18:11:31')->shouldReturn('2008-08-07 18:11:31 +0300');
    }
    
    function it_properly_sets_format()
    {
        $this->setDateTimeFormat('Y-m-d');
        $this->buildFromTime('2008:08:07 18:11:31')->shouldReturn('2008-08-07');
    }
}
