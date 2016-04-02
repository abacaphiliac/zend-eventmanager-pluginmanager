<?php

namespace AbacaphiliacTest\Zend\EventManager\PluginManager;

use Abacaphiliac\Zend\EventManager\PluginManager\NullEventManagerFactory;
use Zend\EventManager\SharedEventManager;
use Zend\ServiceManager\ServiceManager;

class NullEventManagerFactoryTest extends \PHPUnit_Framework_TestCase
{
    /** @var  ServiceManager */
    private $serviceLocator;
    
    /** @var  NullEventManagerFactory */
    private $sut;

    protected function setUp()
    {
        parent::setUp();
        
        $this->serviceLocator = new ServiceManager();
        
        $this->sut = new NullEventManagerFactory();
    }
    
    public function testCreateServiceWithSharedEventManager()
    {
        $this->serviceLocator->setService('SharedEventManager', new SharedEventManager());
        
        $actual = $this->sut->createService($this->serviceLocator);
        
        self::assertInstanceOf('\Abacaphiliac\Zend\EventManager\PluginManager\NullEventManager', $actual);
    }
    
    public function testCreateServiceWithoutSharedEventManager()
    {
        $actual = $this->sut->createService($this->serviceLocator);
        
        self::assertInstanceOf('\Abacaphiliac\Zend\EventManager\PluginManager\NullEventManager', $actual);
    }
}
