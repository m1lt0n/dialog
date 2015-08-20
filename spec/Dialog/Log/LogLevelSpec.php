<?php

namespace spec\Dialog\Log;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Dialog\Log\LogLevel;

class LogLevelSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Dialog\Log\LogLevel');
    }
    
    function it_gets_label_of_log_level_that_exists()
    {
        $this::getLabel(LogLevel::WARNING)->shouldReturn('warning');
    }
    
    function it_throws_exception_trying_to_get_label_if_level_does_not_exist()
    {
        $this->shouldThrow('Dialog\Log\InvalidArgumentException')->duringGetLabel(1999);
    }

    function it_gets_priority_of_log_level_that_exists()
    {
        $this::getPriority(LogLevel::WARNING)->shouldReturn(40);
    }
    
    function it_throws_exception_trying_to_get_priority_if_level_does_not_exist()
    {
        $this->shouldThrow('Dialog\Log\InvalidArgumentException')->duringGetPriority('invalid');
    }
    
    function it_checks_for_level_validity()
    {
        $this::isValid(LogLevel::WARNING)->shouldBe(true);
        $this::isValid('wronglevel')->shouldBe(false);
    }
}
