<?php


namespace Jedi\Interfaces;


interface DIContainerInterface
{
    public function get(String $class, Array $arguments = []): object;

    public function set(String $class, $arguments = null): void;

}