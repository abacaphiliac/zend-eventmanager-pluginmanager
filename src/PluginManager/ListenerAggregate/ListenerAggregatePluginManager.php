<?php

namespace Abacaphiliac\Zend\EventManager\PluginManager\ListenerAggregate;

use Zend\EventManager\ListenerAggregateInterface;
use Zend\ServiceManager\AbstractPluginManager;
use Zend\ServiceManager\Exception\RuntimeException;

class ListenerAggregatePluginManager extends AbstractPluginManager
{
    /**
     * Validate the plugin
     *
     * Checks that the filter loaded is either a valid callback or an instance
     * of FilterInterface.
     *
     * @param  mixed $plugin
     * @return void
     * @throws RuntimeException if invalid
     */
    public function validatePlugin($plugin)
    {
        if ($plugin instanceof ListenerAggregateInterface) {
            // we're ok.
            return;
        }

        throw new RuntimeException(sprintf(
            'Plugin of type %s is invalid; must implement %s',
            (is_object($plugin) ? get_class($plugin) : gettype($plugin)),
            '\Zend\EventManager\ListenerAggregateInterface'
        ));
    }
}
