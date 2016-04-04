<?php

namespace Abacaphiliac\Zend\EventManager\PluginManager\ListenerAggregate;

use Zend\ServiceManager\Config;

interface ListenerAggregatesProviderInterface
{
    /**
     * @return mixed[]|Config
     */
    public function getListenerAggregatesConfig();
}
