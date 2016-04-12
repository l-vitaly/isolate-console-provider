<?php

namespace Isolate\ConsoleServiceProvider\Console;

use Symfony\Component\Console\Application as BaseApplication;
use Pimple\Container;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

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
   * @var EventDispatcherInterface
   */
  private $dispatcher;

  /**
   * @param Container $container
   * @param string $basePath
   * @param string $name
   * @param string $version
   * @param EventDispatcherInterface $dispatcher
   */
  public function __construct(Container $container, $basePath, $name = 'UNKNOWN', $version = 'UNKNOWN', EventDispatcherInterface $dispatcher)
  {
    parent::__construct($name, $version);

    $this->container = $container;
    $this->basePath = $basePath;
    $this->dispatcher = $dispatcher;

    $container->boot();
  }

  public function run(InputInterface $input = null, OutputInterface $output = null)
  {
    $this->dispatcher->dispatch(ConsoleEvents::INIT, new ConsoleEvent($this));
    return parent::run($input, $output);
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
