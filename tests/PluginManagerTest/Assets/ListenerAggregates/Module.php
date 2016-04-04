<?php

namespace AbacaphiliacTest\Zend\EventManager\PluginManager\Assets\ListenerAggregates;

use Abacaphiliac\Zend\EventManager\PluginManager\ListenerAggregate\ListenerAggregatesProviderInterface;
use Zend\ServiceManager\Config;

class Module implements ListenerAggregatesProviderInterface
{
    /**
     * @return mixed[]|Config
     */
    public function getListenerAggregatesConfig()
    {
        return array(
            'factories' => array(
                'MyListener' =>
                    '\Abacaphiliac\Zend\EventManager\PluginManager\ListenerAggregate\NullListenerAggregateFactory',
            ),
        );
    }
}
