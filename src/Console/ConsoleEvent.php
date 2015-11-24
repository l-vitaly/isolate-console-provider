<?php

namespace Isolate\ConsoleServiceProvider\Console;

use Symfony\Component\EventDispatcher\Event;

/**
 * Class ConsoleEvent
 * @package Isolate\Console
 */
class ConsoleEvent extends Event
{
  /**
   * @var Application
   */
  private $app;

  /**
   * @param Application $app
   */
  public function __construct(Application $app)
  {
    $this->app = $app;
  }

  /**
   * @return Application
   */
  public function getApp()
  {
    return $this->app;
  }
}
