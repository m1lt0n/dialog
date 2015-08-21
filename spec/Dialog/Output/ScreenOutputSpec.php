<?php

namespace spec\Dialog\Output;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;


class ScreenOutputSpec extends ObjectBehavior
{
    function it_implementsOutputInterface()
    {
        $this->shouldHaveType('Dialog\Output\OutputInterface');
    }
    
    function it_outputs_the_proper_message()
    {
        $expected = 'a message';
        
        ob_start();
        $this->output($expected);
        $result = ob_get_clean();
        
        // ob adds whitespace (newlines), so we remove them to compare
        $result = trim($result);
        
        if ($result !== $expected) {
            throw new \PhpSpec\Exception\Example\FailureException("'{$result}' does not match '{$expected}'");
        }
    }
}
