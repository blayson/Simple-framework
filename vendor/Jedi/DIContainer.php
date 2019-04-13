<?php


namespace Jedi;


use Closure;
use Exception;
use Jedi\Exception\ContainerException;
use Jedi\Interfaces\DIContainerInterface;
use ReflectionClass;
use ReflectionException;

class DIContainer implements DIContainerInterface
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
    public function get($className, Array $arguments = []): object
    {
        if ( ! isset($this->container[$className])) {
            $this->set($className);
        }

        return $this->resolve($this->container[$className], $arguments);
    }

    public function set($className, $arguments = null): void
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
     * @throws Exception
     */
    private function resolve($className, Array $arguments): object
    {
        if ($className instanceof Closure) {
            return $className($this, $arguments);
        }

        $reflection = new ReflectionClass($className);

        if ( ! $reflection->isInstantiable()) {
            throw new ContainerException("Class {$className} is not instantiable");
        };

        $constructor = $reflection->getConstructor();
        if (is_null($constructor)) {
            return $reflection->newInstance();
        }

        $arguments = $constructor->getParameters();
        $dependencies = $this->getDependencies($arguments);

        return $reflection->newInstanceArgs($dependencies);
    }

    /**
     * @param $arguments
     *
     * @return array
     * @throws Exception
     */
    public function getDependencies($arguments)
    {
        $dependencies = [];

        foreach ($arguments as $argument) {
            $dependency = $argument->getClass();
            if ($dependency === null) {
                if ($argument->isDefaultValueAvailable()) {
                    $dependencies[] = $argument->getDefaultValue();
                } else {
                    throw new Exception("Can not resolve class dependency {$argument->name}");
                }
            } else {
                $dependencies[] = $this->get($dependency->name);
            }
        }
        return $dependencies;
    }
}
