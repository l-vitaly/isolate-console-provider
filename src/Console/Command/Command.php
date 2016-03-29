<?php
namespace Isolate\ConsoleServiceProvider\Console\Command;

use Pimple\Container;
use Symfony\Component\Console\Command\Command as BaseCommand;

class Command extends BaseCommand
{
  /**
   * @return Container
   */
  public function getContainer()
  {
    return $this->getApplication()->getContainer();
  }

  /**
   * @return Application
   */
  public function getBasePath()
  {
    return $this->getApplication()->getBasePath();
  }
}
