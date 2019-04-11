<?php


namespace Jedi;


//use DIContainerInterface\DIContainerInterface;
use Jedi\Exception\ContainerException;
use ReflectionClass;
use ReflectionException;

class DIContainer
{
    protected $container = [];

    /**
     * @param String $className
     * @param array  $arguments
     *
     * @return object
     * @throws ContainerException
     * @throws ReflectionException
     */
    public function get($className, Array $arguments = null): object
    {
        if ( ! isset($this->container[$className])) {
            $this->set($className);
        }

        return $this->verify($className, $arguments);
    }

    public function set($className, Array $arguments = null): void
    {
        if ($arguments == null) {
            $arguments = $className;
        }
        $this->container[$className] = $arguments;
    }

    /**
     * @param $className
     * @param $arguments
     *
     * @return object
     * @throws ContainerException
     * @throws ReflectionException
     */
    private function verify($className, Array $arguments): object
    {
        $reflection = new ReflectionClass($className);

        if ( ! $reflection->isInstantiable()) {
            throw new ContainerException("Class {$className} is not instantiable");
        };

        $constructor = $reflection->getConstructor();
        if (is_null($constructor)) {
            return $reflection->newInstance();
        }

        return $reflection->newInstanceArgs($arguments);
    }
}