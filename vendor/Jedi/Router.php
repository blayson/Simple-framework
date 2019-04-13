<?php


namespace Jedi;

class Router
{
    protected static $routerMap = [];

    public static function parseUrl(String $url, Request $request)
    {
        $url          = trim($url);
        $parsedUrl    = parse_url($url);
        $explode_path = explode('/', $parsedUrl['path']);
        $params       = explode('&', $parsedUrl['query']);
        $request->setPath($parsedUrl['path']);
        $request->setController($explode_path[1]);
        $request->setAction($explode_path[2]);
        $request->setParams($params);
    }

    public static function register(Array $methods, String $route, $callable)
    {
        self::$routerMap[$route] = ['route' => $route, 'methodsAllowed' => $methods, 'controller' => $callable];
    }

    public static function getRouterMap(): array
    {
        return self::$routerMap;
    }
}