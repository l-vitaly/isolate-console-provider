<?php

namespace Isolate\ConsoleServiceProvider\Console;

use Symfony\Component\Console\Application as BaseApplication;
use Silex\Application as SilexApplication;

class Application extends BaseApplication
{
  /**
   * @var SilexApplication
   */
  private $app;

  /**
   * @var string
   */
  private $basePath;

  /**
   * @param SilexApplication $application
   * @param string $basePath
   * @param string $name
   * @param string $version
   */
  public function __construct(SilexApplication $application, $basePath, $name = 'UNKNOWN', $version = 'UNKNOWN')
  {
    parent::__construct($name, $version);

    $this->app = $application;
    $this->basePath = $basePath;

    $application->boot();
  }

  /**
   * @return SilexApplication
   */
  public function getSilexApp()
  {
    return $this->app;
  }

  /**
   * @return string
   */
  public function getBasePath()
  {
    return $this->basePath;
  }

}
