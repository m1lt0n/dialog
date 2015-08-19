<?php
namespace Dialog\Log;

/**
 * An implementation of the HandlerBagInterface
 */
class HandlerBag implements HandlerBagInterface
{
    /**
     * Holds the handlers
     *
     * @var array with Dialog\Log\HandlerInterface instances
     */
    protected $handlers = [];

    /**
     * Add a handler to the bag
     * 
     * @param string $key the unique key for the handler
     * @param \Dialog\Log\HandlerInterface $handler the handler instance
     * @return null
     * 
     * @see \Dialog\Log\HandlerBagInterface::add()
     */
    public function add($key, HandlerInterface $handler)
    {
        $this->handlers[$key] = $handler;
    }
    
    /**
     * Get a handler by key
     * 
     * @param string $key the handler key
     * @return mixed the handler instance or null if not found
     * 
     * @see \Dialog\Log\HandlerBagInterface::get()
     */
    public function get($key)
    {
        return isset($this->handlers[$key]) ? $this->handlers[$key] : null;
    }
    
    /**
     * Remove a handler from the bag
     * 
     * @param string $key the handler's key
     * @return boolean true if found and removed, false otherwise
     * 
     * @see \Dialog\Log\HandlerBagInterface::remove()
     */
    public function remove($key)
    {
        if (isset($this->handlers[$key])) {
            unset($this->handlers[$key]);
            return true;
        }
        
        return false;
    }
    
    /**
     * Clear the bag (remove all handlers)
     * 
     * @return null
     * 
     * @see \Dialog\Log\HandlerBagInterface::clear()
     */
    public function clear()
    {
        $this->handlers = [];        
    }

    /**
     * Returns all handlers
     * 
     * @return array an array with all the handlers as elements
     * 
     * @see \Dialog\Log\HandlerBagInterface::handlers()
     */
    public function handlers()
    {
        return $this->handlers;
    }
}