<?php

namespace AbacaphiliacTest\Zend\EventManager\PluginManager\ListenerAggregate;

use Abacaphiliac\Zend\EventManager\PluginManager\ListenerAggregate\NullListenerAggregate;
use Zend\EventManager\EventManagerInterface;

class NullListenerAggregateTest extends \PHPUnit_Framework_TestCase
{
    /** @var  \PHPUnit_Framework_MockObject_MockObject|EventManagerInterface */
    private $events;
    
    /** @var NullListenerAggregate */
    private $sut;

    protected function setUp()
    {
        parent::setUp();

        $this->events = $this->getMock('\Zend\EventManager\EventManagerInterface');
        
        $this->sut = new NullListenerAggregate();
    }
    
    public function testAttachDoesNothing()
    {
        $this->events->expects(self::never())->method(self::anything());
        
        $this->sut->attach($this->events);
    }
    
    public function testDetachDoesNothing()
    {
        $this->events->expects(self::never())->method(self::anything());
        
        $this->sut->detach($this->events);
    }
}
