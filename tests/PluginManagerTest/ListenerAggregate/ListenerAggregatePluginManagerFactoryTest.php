<?php

namespace AbacaphiliacTest\Zend\EventManager\PluginManager\ListenerAggregate;

use Abacaphiliac\Zend\EventManager\PluginManager\ListenerAggregate\ListenerAggregatePluginManagerFactory;
use Zend\ServiceManager\ServiceManager;

class ListenerAggregatePluginManagerFactoryTest extends \PHPUnit_Framework_TestCase
{
    /** @var  ServiceManager */
    private $serviceLocator;
    
    /** @var ListenerAggregatePluginManagerFactory */
    private $sut;

    protected function setUp()
    {
        parent::setUp();

        $this->serviceLocator = new ServiceManager();
        
        $this->sut = new ListenerAggregatePluginManagerFactory();
    }
    
    public function testCreateService()
    {
        $this->serviceLocator->setService('config', array());
        
        $actual = $this->sut->createService($this->serviceLocator);
        
        self::assertInstanceOf(
            '\Abacaphiliac\Zend\EventManager\PluginManager\ListenerAggregate\ListenerAggregatePluginManager',
            $actual
        );
    }
}
