<?php


namespace DIContainerInterface;


interface DIContainerInterface
{
    public static function get(String $class, Array $arguments = null) : object;
    public static function mapValue($key, $value);
    public static function mapClass($key, $value, $arguments = null);
    public static function mapClassAsSingleton($key, $value, $arguments = null);
}