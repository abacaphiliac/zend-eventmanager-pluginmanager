<?php

namespace AbacaphiliacTest\Zend\EventManager\PluginManager;

use Abacaphiliac\Zend\EventManager\PluginManager\EventManagerPluginManagerFactory;
use Zend\ServiceManager\ServiceManager;

class EventManagerPluginManagerFactoryTest extends \PHPUnit_Framework_TestCase
{
    /** @var  ServiceManager */
    private $serviceLocator;
    
    /** @var EventManagerPluginManagerFactory */
    private $sut;

    protected function setUp()
    {
        parent::setUp();

        $this->serviceLocator = new ServiceManager();
        
        $this->sut = new EventManagerPluginManagerFactory();
    }
    
    public function testCreateService()
    {
        $this->serviceLocator->setService('config', array());
        
        $actual = $this->sut->createService($this->serviceLocator);
        
        self::assertInstanceOf('\Abacaphiliac\Zend\EventManager\PluginManager\EventManagerPluginManager', $actual);
    }
}
