<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/zf2 for the canonical source repository
 * @copyright Copyright (c) 2005-2013 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Abacaphiliac\Zend\EventManager\PluginManager;

use Zend\EventManager\EventManager;
use Zend\EventManager\SharedEventManagerInterface;
use Zend\ServiceManager\AbstractPluginManager;
use Zend\ServiceManager\Exception\ServiceNotFoundException;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class EventManagerFactory implements FactoryInterface
{
    /**
     * Create an EventManager instance
     *
     * Creates a new EventManager instance, seeding it with a shared instance
     * of SharedEventManager.
     *
     * @param  ServiceLocatorInterface $serviceLocator
     * @return EventManager
     * @throws ServiceNotFoundException
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        if ($serviceLocator instanceof AbstractPluginManager) {
            $serviceLocator = $serviceLocator->getServiceLocator();
        }
        
        /** @var SharedEventManagerInterface $sharedEventManager */
        $sharedEventManager = $serviceLocator->get('SharedEventManager');
        
        $em = new EventManager();
        $em->setSharedManager($sharedEventManager);
        return $em;
    }
}
