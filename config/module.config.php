<?php

return array(
    'service_manager' => array(
        'factories' => array(
            'EventManagers' => '\Abacaphiliac\Zend\EventManager\PluginManager\EventManagerPluginManagerFactory',
            'ListenerAggregates' =>
                '\Abacaphiliac\Zend\EventManager\PluginManager\ListenerAggregate\ListenerAggregatePluginManagerFactory',
        ),
    ),
);
