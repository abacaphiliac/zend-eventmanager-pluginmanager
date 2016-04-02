<?php

namespace AbacaphiliacTest\Zend\EventManager\PluginManager;

use Abacaphiliac\Zend\EventManager\PluginManager\EventManagerFactory;
use Abacaphiliac\Zend\EventManager\PluginManager\EventManagerPluginManager;
use Zend\EventManager\SharedEventManager;
use Zend\ServiceManager\ServiceManager;

class EventManagerFactoryTest extends \PHPUnit_Framework_TestCase
{
    /** @var EventManagerFactory */
    private $sut;

    protected function setUp()
    {
        parent::setUp();

        $this->sut = new EventManagerFactory();
    }
    
    public function testCreateServiceFromServiceManager()
    {
        $serviceLocator = new ServiceManager();
        $serviceLocator->setService('SharedEventManager', new SharedEventManager());
        
        $actual = $this->sut->createService($serviceLocator);
        
        self::assertInstanceOf('\Zend\EventManager\EventManager', $actual);
    }
    
    public function testCreateServiceFromPluginManager()
    {
        $serviceLocator = new ServiceManager();
        $serviceLocator->setService('SharedEventManager', new SharedEventManager());
        
        $eventManagers = new EventManagerPluginManager();
        $eventManagers->setServiceLocator($serviceLocator);

        $actual = $this->sut->createService($eventManagers);

        self::assertInstanceOf('\Zend\EventManager\EventManager', $actual);
    }
}
