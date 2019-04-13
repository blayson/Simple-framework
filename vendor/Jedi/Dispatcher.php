<?php

namespace Jedi;


class Dispatcher
{
    /**
     * @var $request Request
     */
    protected $request;
    protected $response;
    protected $container;

    public function __construct($container)
    {
        $this->container = $container;
    }

    public function dispatch()
    {
        $this->response = new Response();
        $this->request  = new Request();
        Router::parseUrl($this->request->getUrl(), $this->request);
        $route = Router::getRouterMap()[$this->request->getController()];
        if ( ! $route) {
            $this->response->notFound();
        }
        if ( ! in_array($this->request->getMethod(), $route['methodsAllowed'])) {
            $this->response->notAllowed();
        };
        $controller = $this->loadController($route['controller']);
        $action     = $this->request->getAction() ?? 'index';
        call_user_func_array([$controller, $action], [$this->request, $this->response]);
    }

    protected function loadController($obj)
    {
        $modelObj = $this->loadModel();
        if ($modelObj) {
            $controllerObj = new $obj($this->container, $modelObj);
        } else {
            $controllerObj = new $obj($this->container);
        }

        return $controllerObj;
    }

    protected function loadModel()
    {
        $controller = $this->request->getController();

        $req_model_exists = MODELS.'/'.$controller.'Model.php';
        if (file_exists($req_model_exists)) {
            $name     = $controller."Model";
            $model    = 'Models\\'.$name;
            $modelObj = new $model();

            return $modelObj;
        }

        return false;
    }
}