<?php

namespace AbacaphiliacTest\Zend\EventManager\PluginManager\ListenerAggregate;

use Abacaphiliac\Zend\EventManager\PluginManager\ListenerAggregate\ListenerAggregatePluginManager;
use Abacaphiliac\Zend\EventManager\PluginManager\ListenerAggregate\NullListenerAggregate;

class ListenerAggregatePluginManagerTest extends \PHPUnit_Framework_TestCase
{
    /** @var ListenerAggregatePluginManager */
    private $sut;

    protected function setUp()
    {
        parent::setUp();

        $this->sut = new ListenerAggregatePluginManager();
    }
    
    public function testPluginIsValid()
    {
        $actual = $this->sut->validatePlugin(new NullListenerAggregate());
        
        self::assertNull($actual);
    }

    /**
     * @expectedException \Zend\ServiceManager\Exception\RuntimeException
     * @throws \Zend\ServiceManager\Exception\RuntimeException
     */
    public function testPluginIsInvalid()
    {
        $this->sut->validatePlugin(new \stdClass());
    }
}
