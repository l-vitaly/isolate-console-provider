<?php

namespace Isolate\ConsoleServiceProvider;

use Silex\Application;
use Silex\ServiceProviderInterface;
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
  public function register(Application $app)
  {
    $app['console'] = $app->share(function() use ($app) {
      $console = new ConsoleApplication(
        $app,
        $app['console.base_path'],
        $app['console.name'],
        $app['console.version']
      );

      $app['dispatcher']->dispatch(ConsoleEvents::INIT, new ConsoleEvent($console));

      return $console;
    });
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
