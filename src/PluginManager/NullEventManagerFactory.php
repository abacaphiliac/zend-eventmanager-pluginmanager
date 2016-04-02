<?php

namespace Abacaphiliac\Zend\EventManager\PluginManager;

use Zend\EventManager\SharedEventManager;
use Zend\EventManager\SharedEventManagerInterface;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class NullEventManagerFactory implements FactoryInterface
{
    /**
     * @param ServiceLocatorInterface $serviceLocator
     * @return \Zend\EventManager\EventManager
     * @throws \Zend\ServiceManager\Exception\ServiceNotFoundException
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $sharedEventManager = $this->getSharedEventManager($serviceLocator);
        
        return new NullEventManager($sharedEventManager);
    }

    /**
     * @param ServiceLocatorInterface $serviceLocator
     * @return SharedEventManagerInterface
     * @throws \Zend\ServiceManager\Exception\ServiceNotFoundException
     */
    private function getSharedEventManager(ServiceLocatorInterface $serviceLocator)
    {
        if ($serviceLocator->has('SharedEventManager')) {
            return $serviceLocator->get('SharedEventManager');
        }
        
        return new SharedEventManager();
    }
}
