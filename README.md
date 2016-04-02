# abacaphiliac/zend-eventmanager-pluginmanager
A ZF2 Plugin Manager for ZF2 Event Managers.

# installation
composer require abacaphiliac/zend-eventmanager-pluginmanager

# usage
1. add `Abacaphiliac\Zend\EventManager\PluginManager` module to your ZF2 application module config.
1. create a service-manager config block with key `event_managers` in your application config.
1. register a named event manager in the `event_managers` config, via `invokables`, `factories`, etc.
1. get your named event manager from the service locator!

```php
$eventManager = $serviceLocator->get('EventManagers')->get('MyNamedEventManager');
```

# dependencies
ZF2 EventManager, ModuleManager, MVC, and ServiceManager.

dev deployments include the entire framework because the Module collaboration test boots the ModuleManager,
which has many hidden dependencies in most of the ZF tags.

See [composer.json](composer.json).

# contributing
Don't break the build : P
```
vendor/bin/phing
```
