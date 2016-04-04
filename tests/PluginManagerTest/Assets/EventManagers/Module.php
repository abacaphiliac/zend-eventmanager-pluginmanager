<?php

namespace AbacaphiliacTest\Zend\EventManager\PluginManager\Assets\EventManagers;

use Abacaphiliac\Zend\EventManager\PluginManager\EventManagersProviderInterface;
use Zend\ServiceManager\Config;

class Module implements EventManagersProviderInterface
{
    /**
     * @return mixed[]|Config
     */
    public function getEventManagersConfig()
    {
        return array(
            'factories' => array(
                'MyEventManager' => '\Abacaphiliac\Zend\EventManager\PluginManager\EventManagerFactory',
            ),
        );
    }
}
