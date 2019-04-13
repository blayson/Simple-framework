<?php

namespace Jedi;


class App
{
    protected $container;
    protected $version = '0.0.1a';

    public function __construct($container)
    {
//        if (is_array($container)) {
//            $container = new DIContainer();
//        }
//        if (!$container instanceof DIContainerInterface) {
//            throw new ContainerException('Expected a ContainerInterface');
//        }
        $this->container = $container;
    }

    public function container()
    {
        var_dump($this->container);
    }

    public function getContainer()
    {
        return $this->container;
    }

    public function register($method, $route, $callable)
    {
        if ( ! is_array($method)) {
            $method = (Array)$method;
        }
        Router::register($method, $route, $callable);
    }

    public function run()
    {
        $dispatcher = new Dispatcher($this->container);
        $dispatcher->dispatch();
    }
}
