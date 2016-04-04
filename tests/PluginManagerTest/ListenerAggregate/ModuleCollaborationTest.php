<?php

namespace AbacaphiliacTest\Zend\EventManager\PluginManager\ListenerAggregate;

use Abacaphiliac\Zend\EventManager\PluginManager\Module;
use Zend\Mvc\Service\ServiceManagerConfig;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\ServiceManager\ServiceManager;

class ModuleCollaborationTest extends \PHPUnit_Framework_TestCase
{
    /** @var  Module */
    private $sut;
    
    /** @var  ServiceManager */
    private $serviceLocator;

    protected function setUp()
    {
        parent::setUp();
        
        $this->serviceLocator = new ServiceManager(new ServiceManagerConfig());

        $this->sut = new Module();
    }
    
    public function testEventManagersModule()
    {
        $this->serviceLocator->setService('ApplicationConfig', array(
            'modules' => array(
                'Abacaphiliac\Zend\EventManager\PluginManager',
                'AbacaphiliacTest\Zend\EventManager\PluginManager\Assets\ListenerAggregates',
            ),
            'module_listener_options' => array(),
        ));

        $moduleManager = $this->serviceLocator->get('ModuleManager');
        $moduleManager->loadModules();

        /** @var ServiceLocatorInterface $listeners */
        $listeners = $this->serviceLocator->get('ListenerAggregates');

        $actual = $listeners->get('MyListener');

        self::assertInstanceOf('\Zend\EventManager\ListenerAggregateInterface', $actual);
    }
}
