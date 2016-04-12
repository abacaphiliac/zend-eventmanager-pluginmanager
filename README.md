[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/abacaphiliac/zend-eventmanager-pluginmanager/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/abacaphiliac/zend-eventmanager-pluginmanager/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/abacaphiliac/zend-eventmanager-pluginmanager/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/abacaphiliac/zend-eventmanager-pluginmanager/?branch=master)
[![Build Status](https://travis-ci.org/abacaphiliac/zend-eventmanager-pluginmanager.svg?branch=master)](https://travis-ci.org/abacaphiliac/zend-eventmanager-pluginmanager)

# abacaphiliac/zend-eventmanager-pluginmanager
A ZF2 Plugin Manager for ZF2 Event Managers.

# Installation
composer require abacaphiliac/zend-eventmanager-pluginmanager

# Usage
1. add `Abacaphiliac\Zend\EventManager\PluginManager` module to your ZF2 application module config.
1. create a service-manager config block with key `event_managers` in your application config.
1. register a named event manager in the `event_managers` config, via `invokables`, `factories`, etc.
1. get your named event manager from the service locator!

```php
$eventManager = $serviceLocator->get('EventManagers')->get('MyNamedEventManager');
```

# Dependencies
ZF2 EventManager, ModuleManager, MVC, and ServiceManager.

dev deployments include the entire framework because the Module collaboration test boots the ModuleManager,
which has many hidden dependencies in most of the ZF tags.

See [composer.json](composer.json).

## Contributing
```
composer install && vendor/bin/phing
```

This library attempts to comply with [PSR-1][], [PSR-2][], and [PSR-4][]. If
you notice compliance oversights, please send a patch via pull request.

[PSR-1]: https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-1-basic-coding-standard.md
[PSR-2]: https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-2-coding-style-guide.md
[PSR-4]: https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-4-autoloader.md
