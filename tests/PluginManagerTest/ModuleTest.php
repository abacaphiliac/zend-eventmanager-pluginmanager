<?php

namespace AbacaphiliacTest\Zend\EventManager\PluginManager;

use Abacaphiliac\Zend\EventManager\PluginManager\Module;
use Zend\ModuleManager\Listener\ServiceListener;
use Zend\ModuleManager\Listener\ServiceListenerInterface;
use Zend\ModuleManager\ModuleEvent;
use Zend\ModuleManager\ModuleManager;
use Zend\ServiceManager\ServiceManager;

class ModuleTest extends \PHPUnit_Framework_TestCase
{
    /** @var  \PHPUnit_Framework_MockObject_MockObject|ServiceListenerInterface */
    private $serviceListener;
    
    /** @var  \PHPUnit_Framework_MockObject_MockObject|ModuleManager */
    private $moduleManager;
    
    /** @var  ServiceManager */
    private $serviceLocator;
    
    /** @var  Module */
    private $sut;

    protected function setUp()
    {
        parent::setUp();

        $this->serviceLocator = new ServiceManager();
        $this->serviceListener = $this->getMock('\Zend\ModuleManager\Listener\ServiceListenerInterface');
        $this->moduleManager = $this->getMockBuilder('\Zend\ModuleManager\ModuleManager')
            ->disableOriginalConstructor()
            ->getMock();
        
        $this->sut = new Module();
    }
    
    public function testGetConfig()
    {
        $actual = unserialize(serialize($this->sut->getConfig()));
        
        self::assertInternalType('array', $actual);
    }
    
    public function testRegisterPluginManager()
    {
        $serviceListener = new ServiceListener($this->serviceLocator);
        
        $actual = Module::registerPluginManager($serviceListener);
        
        self::assertSame($serviceListener, $actual);
    }
    
    public function testInitRegistersPluginManager()
    {
        $event = new ModuleEvent();
        $event->setParam('ServiceManager', $this->serviceLocator);

        $this->moduleManager->expects(self::any())->method('getEvent')
            ->willReturn($event);

        $this->serviceLocator->setService('ServiceListener', $this->serviceListener);
        
        $this->serviceListener->expects(self::atLeastOnce())->method('addServiceManager');

        $actual = $this->sut->init($this->moduleManager);
        
        self::assertNull($actual);
    }
}
