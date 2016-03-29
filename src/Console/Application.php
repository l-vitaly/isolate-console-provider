<?php

namespace Isolate\ConsoleServiceProvider\Console;

use Symfony\Component\Console\Application as BaseApplication;
use Pimple\Container;

class Application extends BaseApplication
{
  /**
   * @var Container
   */
  private $container;

  /**
   * @var string
   */
  private $basePath;

  /**
   * @param Container $container
   * @param string $basePath
   * @param string $name
   * @param string $version
   */
  public function __construct(Container $container, $basePath, $name = 'UNKNOWN', $version = 'UNKNOWN')
  {
    parent::__construct($name, $version);

    $this->container = $container;
    $this->basePath = $basePath;

    $container->boot();
  }

  /**
   * @return Container
   */
  public function getContainer()
  {
    return $this->container;
  }

  /**
   * @return string
   */
  public function getBasePath()
  {
    return $this->basePath;
  }

}
