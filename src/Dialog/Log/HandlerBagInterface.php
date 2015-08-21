<?php
namespace Dialog\Log;

/**
 * Interface for a Bag that holds HandlerInterface instances
 */
interface HandlerBagInterface
{
    /**
     * Adds a HandlerInterface instance in the handlers of the bag
     *
     * @param string $key the unique key of the handler instance
     * @param HandlerInterface $handler the handler
     * @return null
     */
    public function add($key, HandlerInterface $handler);
    
    /**
     * Gets a handler from the bag
     *
     * @param string $key the key of the handler
     * @return mixed HandlerInterface instance or null
     */
    public function get($key);
    
    /**
     * Removes a handler from the bag
     *
     * @param string $key the key of the handler
     * @return null
     */
    public function remove($key);
    
    /**
     * Clears the bag from all handlers
     *
     * @return null
     */
    public function clear();
    
    /**
     * Gets all handlers
     *
     * @return array an array with HandlerInterface instances as elements
     */
    public function handlers();
}
