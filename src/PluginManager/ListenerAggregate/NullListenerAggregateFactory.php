<?php

namespace Abacaphiliac\Zend\EventManager\PluginManager\ListenerAggregate;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class NullListenerAggregateFactory implements FactoryInterface
{
    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return NullListenerAggregate
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return new NullListenerAggregate();
    }
}
