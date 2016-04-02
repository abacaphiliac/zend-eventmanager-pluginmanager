<?php

namespace AbacaphiliacTest\Zend\EventManager\PluginManager\ListenerAggregate;

use Abacaphiliac\Zend\EventManager\PluginManager\ListenerAggregate\NullListenerAggregateFactory;
use Zend\ServiceManager\ServiceManager;

class NullListenerAggregateFactoryTest extends \PHPUnit_Framework_TestCase
{
    /** @var  ServiceManager */
    private $serviceLocator;
    
    /** @var NullListenerAggregateFactory */
    private $sut;

    protected function setUp()
    {
        parent::setUp();

        $this->serviceLocator = new ServiceManager();
        
        $this->sut = new NullListenerAggregateFactory();
    }
    
    public function testCreateService()
    {
        $actual = $this->sut->createService($this->serviceLocator);
        
        self::assertInstanceOf(
            '\Abacaphiliac\Zend\EventManager\PluginManager\ListenerAggregate\NullListenerAggregate',
            $actual
        );
    }
}
