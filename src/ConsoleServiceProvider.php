<?php

namespace Isolate\ConsoleServiceProvider;

use Pimple\Container;
use Pimple\ServiceProviderInterface;
use Isolate\ConsoleServiceProvider\Console\ConsoleEvent;
use Isolate\ConsoleServiceProvider\Console\ConsoleEvents;
use Isolate\ConsoleServiceProvider\Console\Application as ConsoleApplication;

class ConsoleServiceProvider implements ServiceProviderInterface
{
  /**
   * Registers services on the given app.
   *
   * This method should only be used to configure services and parameters.
   * It should not get services.
   */
  public function register(Container $container)
  {
    $container['console'] = function() use ($container) {
      $console = new ConsoleApplication(
        $container,
        $container['console.base_path'],
        $container['console.name'],
        $container['console.version']
      );

      $container['dispatcher']->dispatch(ConsoleEvents::INIT, new ConsoleEvent($console));

      return $console;
    };
  }

  /**
   * Bootstraps the application.
   *
   * This method is called after all services are registered
   * and should be used for "dynamic" configuration (whenever
   * a service must be requested).
   */
  public function boot(Application $app)
  {
  }
}
