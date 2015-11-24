<?php
namespace Isolate\ConsoleServiceProvider\Console\Command;

use Silex\Application;
use Symfony\Component\Console\Command\Command as BaseCommand;

class Command extends BaseCommand
{
  /**
   * @return Application
   */
  public function getSilexApp()
  {
    return $this->getApplication()->getSilexApp();
  }

  /**
   * @return Application
   */
  public function getBasePath()
  {
    return $this->getApplication()->getBasePath();
  }
}
