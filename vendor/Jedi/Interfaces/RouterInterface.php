<?php


namespace Jedi\Interfaces;


use Jedi\Request;

interface RouterInterface
{
    public static function parseUrl(String $url, Request $request);

    public static function register(Array $methods, String $route, $callable);

    public static function getRouterMap(): array;
}