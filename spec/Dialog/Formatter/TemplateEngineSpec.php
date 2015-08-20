<?php

namespace spec\Dialog\Formatter;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class TemplateEngineSpec extends ObjectBehavior
{
    function it_implements_TemplateEngineInterface()
    {
        $this->shouldHaveType('Dialog\Formatter\TemplateEngineInterface');
    }
    
    function it_properly_renders()
    {
        $this->setTemplate('[a] [b] {z}');
        $this->setDelimiters('[', ']');
        $this->render(['a' => 'alpha', 'b' => 'beta', 'z' => 'zeta'])->shouldReturn('alpha beta {z}');
    }
}
