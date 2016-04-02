<?php

namespace AbacaphiliacTest\Zend\EventManager\PluginManager;

use Abacaphiliac\Zend\EventManager\PluginManager\EventManagerPluginManager;
use Zend\EventManager\EventManager;

class EventManagerPluginManagerTest extends \PHPUnit_Framework_TestCase
{
    /** @var EventManagerPluginManager */
    private $sut;

    protected function setUp()
    {
        parent::setUp();

        $this->sut = new EventManagerPluginManager();
    }
    
    public function testPluginIsValid()
    {
        $actual = $this->sut->validatePlugin(new EventManager());
        
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
