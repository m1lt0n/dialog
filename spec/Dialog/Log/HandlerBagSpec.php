<?php

namespace spec\Dialog\Log;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Dialog\Log\HandlerInterface;

class HandlerBagSpec extends ObjectBehavior
{
    function it_implements_the_HandlerBagInterface()
    {
        $this->shouldHaveType('Dialog\Log\HandlerBagInterface');
    }
    
    function it_adds_a_new_handler(HandlerInterface $handler)
    {
        $this->add('h1', $handler);
        $this->add('h2', $handler);
        // overwrites previous one
        $this->add('h1', $handler);
        $this->handlers()->shouldHaveCount(2);
    }
    
    function it_removes_an_existing_handler(HandlerInterface $handler)
    {
        $this->add('h1', $handler);
        $this->remove('h1')->shouldReturn(true);
        $this->handlers()->shouldHaveCount(0);
    }

    function it_handles_removal_of_inexistent_handler_smoothly()
    {
        $this->remove('h1')->shouldReturn(false);
    }
    
    function it_gets_handler_from_bag(HandlerInterface $handler)
    {
        $this->add('h1', $handler);
        $this->get('h1')->shouldReturn($handler);
        
        $this->remove('h1');
        $this->get('h1')->shouldReturn(null);
    }
    
    function it_clears_bag(HandlerInterface $handler)
    {
        $this->add('h1', $handler);
        $this->add('h2', $handler);
        $this->handlers()->shouldHaveCount(2);
        $this->clear();
        $this->handlers()->shouldHaveCount(0);
    }
    
    function it_gets_all_handlers(HandlerInterface $handler)
    {
        $this->add('h1', $handler);
        $this->add('h2', $handler);
        $this->handlers()->shouldBe(['h1' => $handler, 'h2' => $handler]);
    }
}
