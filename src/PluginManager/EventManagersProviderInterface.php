<?php

namespace Abacaphiliac\Zend\EventManager\PluginManager;

use Zend\ServiceManager\Config;

interface EventManagersProviderInterface
{
    /**
     * @return mixed[]|Config
     */
    public function getEventManagersConfig();
}
