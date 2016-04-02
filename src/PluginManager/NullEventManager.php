<?php

namespace Abacaphiliac\Zend\EventManager\PluginManager;

use Traversable;
use Zend\EventManager\EventManagerInterface;
use Zend\EventManager\ListenerAggregateInterface;
use Zend\EventManager\ResponseCollection;
use Zend\EventManager\SharedEventManagerAwareInterface;
use Zend\EventManager\SharedEventManagerInterface;
use Zend\Stdlib\CallbackHandler;

class NullEventManager implements EventManagerInterface
{
    /** @var  SharedEventManagerInterface */
    private $sharedEventManager;

    /**
     * NullEventManager constructor.
     * @param SharedEventManagerInterface $sharedEventManager
     */
    public function __construct(SharedEventManagerInterface $sharedEventManager)
    {
        $this->sharedEventManager = $sharedEventManager;
    }

    /**
     * Trigger an event
     *
     * Should allow handling the following scenarios:
     * - Passing Event object only
     * - Passing event name and Event object only
     * - Passing event name, target, and Event object
     * - Passing event name, target, and array|ArrayAccess of arguments
     *
     * Can emulate triggerUntil() if the last argument provided is a callback.
     *
     * @param  string $event
     * @param  object|string $target
     * @param  array|object $argv
     * @param  null|callable $callback
     * @return ResponseCollection
     */
    public function trigger($event, $target = null, $argv = array(), $callback = null)
    {
        return new ResponseCollection();
    }

    /**
     * Trigger an event until the given callback returns a boolean false
     *
     * Should allow handling the following scenarios:
     * - Passing Event object and callback only
     * - Passing event name, Event object, and callback only
     * - Passing event name, target, Event object, and callback
     * - Passing event name, target, array|ArrayAccess of arguments, and callback
     *
     * @param  string $event
     * @param  object|string $target
     * @param  array|object $argv
     * @param  callable $callback
     * @return ResponseCollection
     */
    public function triggerUntil($event, $target, $argv = null, $callback = null)
    {
        return new ResponseCollection();
    }

    /**
     * Attach a listener to an event
     *
     * @param  string $event
     * @param  callable $callback
     * @param  int $priority Priority at which to register listener
     * @return CallbackHandler
     */
    public function attach($event, $callback = null, $priority = 1)
    {
        return new CallbackHandler(function () {
            
        });
    }

    /**
     * Detach an event listener
     *
     * @param  CallbackHandler|ListenerAggregateInterface $listener
     * @return bool
     */
    public function detach($listener)
    {
        return true;
    }

    /**
     * Get a list of events for which this collection has listeners
     *
     * @return array
     */
    public function getEvents()
    {
        return array();
    }

    /**
     * Retrieve a list of listeners registered to a given event
     *
     * @param  string $event
     * @return array|object
     */
    public function getListeners($event)
    {
        return array();
    }

    /**
     * Clear all listeners for a given event
     *
     * @param  string $event
     * @return void
     */
    public function clearListeners($event)
    {

    }

    /**
     * Set the event class to utilize
     *
     * @param  string $class
     * @return EventManagerInterface
     */
    public function setEventClass($class)
    {
        return $this;
    }

    /**
     * Get the identifier(s) for this EventManager
     *
     * @return array
     */
    public function getIdentifiers()
    {
        return array();
    }

    /**
     * Set the identifiers (overrides any currently set identifiers)
     *
     * @param string|int|array|Traversable $identifiers
     * @return EventManagerInterface
     */
    public function setIdentifiers($identifiers)
    {
        return $this;
    }

    /**
     * Add some identifier(s) (appends to any currently set identifiers)
     *
     * @param string|int|array|Traversable $identifiers
     * @return EventManagerInterface
     */
    public function addIdentifiers($identifiers)
    {
        return $this;
    }

    /**
     * Attach a listener aggregate
     *
     * @param  ListenerAggregateInterface $aggregate
     * @param  int $priority If provided, a suggested priority for the aggregate to use
     * @return void return value of {@link ListenerAggregateInterface::attach()}
     */
    public function attachAggregate(ListenerAggregateInterface $aggregate, $priority = 1)
    {
        
    }

    /**
     * Detach a listener aggregate
     *
     * @param  ListenerAggregateInterface $aggregate
     * @return void return value of {@link ListenerAggregateInterface::detach()}
     */
    public function detachAggregate(ListenerAggregateInterface $aggregate)
    {
        
    }

    /**
     * Inject a SharedEventManager instance
     *
     * @param  SharedEventManagerInterface $sharedEventManager
     * @return SharedEventManagerAwareInterface
     */
    public function setSharedManager(SharedEventManagerInterface $sharedEventManager)
    {
        $this->sharedEventManager = $sharedEventManager;
        
        return $this;
    }

    /**
     * Get shared collections container
     *
     * @return SharedEventManagerInterface
     */
    public function getSharedManager()
    {
        return $this->sharedEventManager;
    }

    /**
     * Remove any shared collections
     *
     * @return void
     */
    public function unsetSharedManager()
    {
        $this->sharedEventManager = null;
    }
}
