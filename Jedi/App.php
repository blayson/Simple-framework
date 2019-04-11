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
//            throw new Exception('Expected a ContainerInterface');
//        }
        $this->container = $container;
    }

    public function container() {
        var_dump($this->container);
    }

    public function getContainer()
    {
        return $this->container;
    }
}