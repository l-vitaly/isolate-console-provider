<?php

namespace Isolate\ConsoleServiceProvider;

use Pimple\Container;
use Pimple\ServiceProviderInterface;
use Isolate\ConsoleServiceProvider\Console\Application as ConsoleApplication;

class ConsoleServiceProvider implements ServiceProviderInterface
{
  /**
   * Registers services on the given app.
   *
   * This method should only be used to configure services and parameters.
   * It should not get services.
   * @param Container $container
   */
  public function register(Container $container)
  {
    $container['console'] = function () use ($container) {
      $console = new ConsoleApplication(
        $container,
        $container['console.base_path'],
        $container['console.name'],
        $container['console.version'],
        $container['dispatcher']
      );
      return $console;
    };
  }
}
