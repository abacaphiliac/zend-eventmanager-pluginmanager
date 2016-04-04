<?php

namespace Abacaphiliac\Zend\EventManager\PluginManager;

use Zend\ModuleManager\Listener\ServiceListenerInterface;
use Zend\ModuleManager\ModuleManager;
use Zend\ServiceManager\ServiceLocatorInterface;

class Module
{
    /**
     * @return mixed[]
     */
    public function getConfig()
    {
        return include __DIR__ . '/../../config/module.config.php';
    }

    /**
     * @param ModuleManager $moduleManager
     * @throws \Zend\ServiceManager\Exception\ServiceNotFoundException
     */
    public function init(ModuleManager $moduleManager)
    {
        $moduleEvent = $moduleManager->getEvent();
        
        /** @var ServiceLocatorInterface $serviceLocator */
        $serviceLocator = $moduleEvent->getParam('ServiceManager');
        
        /** @var ServiceListenerInterface $serviceListener */
        $serviceListener = $serviceLocator->get('ServiceListener');
        
        static::registerPluginManager($serviceListener);
    }

    /**
     * @param ServiceListenerInterface $serviceListener
     * @return ServiceListenerInterface
     */
    public static function registerPluginManager(ServiceListenerInterface $serviceListener)
    {
        return $serviceListener->addServiceManager(
            // The name of the plugin manager as it is configured in the service manager,
            // all config is injected into this instance of the plugin manager.
            'EventManagers',
            // The key which is read from the merged module.config.php files, the
            // contents of this key are used as services for the plugin manager.
            'event_managers',
            // The interface which can be specified on a Module class for injecting
            // services into the plugin manager, using this interface in a Module
            // class is optional and depending on how your auto-loader is configured
            // it may not work correctly.
            '\Abacaphiliac\Zend\EventManager\PluginManager\EventManagersProviderInterface',
            // The function specified by the above interface, the return value of this
            // function is merged with the config from 'sample_plugins_config_key'.
            'getEventManagersConfig'
        );
    }
}
