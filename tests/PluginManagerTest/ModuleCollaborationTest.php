<?php

namespace AbacaphiliacTest\Zend\EventManager\PluginManager;

use Abacaphiliac\Zend\EventManager\PluginManager\Module;
use Zend\ModuleManager\ModuleManager;
use Zend\Mvc\Service\ServiceManagerConfig;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\ServiceManager\ServiceManager;

class ModuleCollaborationTest extends \PHPUnit_Framework_TestCase
{
    /** @var  Module */
    private $sut;
    
    /** @var  ServiceManager */
    private $serviceLocator;

    protected function setUp()
    {
        parent::setUp();
        
        $this->serviceLocator = new ServiceManager(new ServiceManagerConfig());

        $this->sut = new Module();
    }

    /**
     * @throws \Zend\ServiceManager\Exception\InvalidArgumentException
     * @throws \Zend\ServiceManager\Exception\InvalidServiceNameException
     * @throws \PHPUnit_Framework_Exception
     * @throws \Zend\ServiceManager\Exception\ServiceNotFoundException
     */
    public function testLoadModulesRegistersPluginManager()
    {
        $this->serviceLocator->setService('ApplicationConfig', array(
            'modules' => array(
                'Abacaphiliac\Zend\EventManager\PluginManager',
            ),
            'module_listener_options' => array(),
        ));
        
        /** @var ModuleManager $moduleManager */
        $moduleManager = $this->serviceLocator->get('ModuleManager');
        self::assertInstanceOf('\Zend\ModuleManager\ModuleManager', $moduleManager);
        
        $moduleManager->loadModules();
        
        $actual = $this->serviceLocator->get('EventManagers');
        
        self::assertInstanceOf('\Abacaphiliac\Zend\EventManager\PluginManager\EventManagerPluginManager', $actual);
    }

    /**
     * @throws \Zend\ServiceManager\Exception\InvalidArgumentException
     * @throws \Zend\ServiceManager\Exception\InvalidServiceNameException
     * @throws \PHPUnit_Framework_Exception
     * @throws \Zend\ServiceManager\Exception\ServiceNotFoundException
     */
    public function testRegisteredPluginManagerProvidesPlugins()
    {
        $this->serviceLocator->setService('ApplicationConfig', array(
            'modules' => array(
                'Abacaphiliac\Zend\EventManager\PluginManager',
            ),
            'module_listener_options' => array(
                'config_glob_paths' => array(
                    __DIR__ . '/_files/autoload/{,*.}{global}.php',
                    __DIR__ . '/_files/autoload/{,*.}{local}.php',
                ),
            ),
        ));
        
        $moduleManager = $this->serviceLocator->get('ModuleManager');
        $moduleManager->loadModules();
        
        /** @var ServiceLocatorInterface $eventManagers */
        $eventManagers = $this->serviceLocator->get('EventManagers');
        
        $actual = $eventManagers->get('MyEventManager');
        
        self::assertInstanceOf('\Zend\EventManager\EventManagerInterface', $actual);
    }
    
    public function testEventManagersModule()
    {
        $this->serviceLocator->setService('ApplicationConfig', array(
            'modules' => array(
                'Abacaphiliac\Zend\EventManager\PluginManager',
                'AbacaphiliacTest\Zend\EventManager\PluginManager\Assets\EventManagers',
            ),
            'module_listener_options' => array(),
        ));

        $moduleManager = $this->serviceLocator->get('ModuleManager');
        $moduleManager->loadModules();

        /** @var ServiceLocatorInterface $eventManagers */
        $eventManagers = $this->serviceLocator->get('EventManagers');

        $actual = $eventManagers->get('MyEventManager');

        self::assertInstanceOf('\Zend\EventManager\EventManagerInterface', $actual);
    }
}
