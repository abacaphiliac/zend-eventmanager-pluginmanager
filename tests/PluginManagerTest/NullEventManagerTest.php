<?php

namespace AbacaphiliacTest\Zend\EventManager\PluginManager;

use Abacaphiliac\Zend\EventManager\PluginManager\NullEventManager;
use Zend\EventManager\SharedEventManager;
use Zend\Stdlib\CallbackHandler;

class NullEventManagerTest extends \PHPUnit_Framework_TestCase
{
    /** @var  SharedEventManager */
    private $sharedEventManager;
    
    /** @var  NullEventManager */
    private $sut;

    protected function setUp()
    {
        parent::setUp();

        $this->sharedEventManager = new SharedEventManager();
        
        $this->sut = new NullEventManager($this->sharedEventManager);
    }
    
    public function testTriggerReturnsEmptyResponseCollection()
    {
        $actual = $this->sut->trigger('SomeEvent');
        
        self::assertInstanceOf('\Zend\EventManager\ResponseCollection', $actual);
        self::assertTrue($actual->isEmpty());
    }
    
    public function testTriggerUntilReturnsEmptyResponseCollection()
    {
        $actual = $this->sut->triggerUntil('SomeEvent', $this);
        
        self::assertInstanceOf('\Zend\EventManager\ResponseCollection', $actual);
        self::assertTrue($actual->isEmpty());
    }
    
    public function testAttachReturnsNoOpCallback()
    {
        $actual = $this->sut->attach('SomeEvent');
        
        self::assertInstanceOf('\Zend\Stdlib\CallbackHandler', $actual);
        self::assertNull($actual->call());
    }
    
    public function testDetachReturnsTrue()
    {
        $actual = $this->sut->detach(new CallbackHandler(function () {
            
        }));
        
        self::assertTrue($actual);
    }
    
    public function testGetEventsIsEmpty()
    {
        $actual = $this->sut->getEvents();
        
        self::assertInternalType('array', $actual);
        self::assertCount(0, $actual);
    }
    
    public function testGetEventsIsEmptyAfterAttach()
    {
        $this->sut->attach('SomeEvent');

        $actual = $this->sut->getEvents();
        
        self::assertInternalType('array', $actual);
        self::assertCount(0, $actual);
    }
    
    public function testGetListeners()
    {
        $actual = $this->sut->getListeners('SomeEvent');
        
        self::assertInternalType('array', $actual);
        self::assertCount(0, $actual);
    }
    
    public function testClearListenersReturnsNull()
    {
        $actual = $this->sut->clearListeners('SomeEvent');
        
        self::assertNull($actual);
    }
    
    public function testSetEventClassReturnsSelf()
    {
        $actual = $this->sut->setEventClass('\Zend\EventManager\EventInterface');
        
        self::assertSame($this->sut, $actual);
    }

    public function testGetIdentifiersIsEmpty()
    {
        $actual = $this->sut->getIdentifiers();

        self::assertInternalType('array', $actual);
        self::assertCount(0, $actual);
    }

    public function testSetIdentifiersReturnsSelf()
    {
        $actual = $this->sut->setIdentifiers(array());
        
        self::assertSame($this->sut, $actual);
    }

    public function testGetIdentifiersIsEmptyAfterSetIdentifiers()
    {
        $this->sut->setIdentifiers(array(
            __CLASS__,
            get_called_class(),
        ));
        
        $actual = $this->sut->getIdentifiers();

        self::assertInternalType('array', $actual);
        self::assertCount(0, $actual);
    }

    public function testAddIdentifiersReturnsSelf()
    {
        $actual = $this->sut->addIdentifiers(array());
        
        self::assertSame($this->sut, $actual);
    }

    public function testAddIdentifiersIsEmptyAfterSetIdentifiers()
    {
        $this->sut->addIdentifiers(array(
            __CLASS__,
            get_called_class(),
        ));
        
        $actual = $this->sut->getIdentifiers();

        self::assertInternalType('array', $actual);
        self::assertCount(0, $actual);
    }

    public function testAttachAggregateReturnsNull()
    {
        $actual = $this->sut->attachAggregate($this->getMock('\Zend\EventManager\ListenerAggregateInterface'));

        self::assertNull($actual);
    }

    public function testGetEventsIsEmptyAfterAttachAggregate()
    {
        $this->sut->attachAggregate($this->getMock('\Zend\EventManager\ListenerAggregateInterface'));

        $actual = $this->sut->getEvents();

        self::assertInternalType('array', $actual);
        self::assertCount(0, $actual);
    }

    public function testDetachAggregateReturnsNull()
    {
        $actual = $this->sut->detachAggregate($this->getMock('\Zend\EventManager\ListenerAggregateInterface'));

        self::assertNull($actual);
    }

    public function testGetSharedManager()
    {
        self::assertSame($this->sharedEventManager, $this->sut->getSharedManager());
    }

    public function testSetSharedManager()
    {
        $actual = $this->sut->setSharedManager($expected = new SharedEventManager());

        self::assertSame($this->sut, $actual);
        self::assertSame($expected, $this->sut->getSharedManager());
    }

    public function testUnsetSharedManager()
    {
        $actual = $this->sut->unsetSharedManager();

        self::assertNull($actual);
        self::assertNull($this->sut->getSharedManager());
    }
}
