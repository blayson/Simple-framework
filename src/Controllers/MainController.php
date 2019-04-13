<?php


namespace Controllers;


use Jedi\Interfaces\DIContainerInterface;
use Jedi\Request;
use Jedi\Response;
use Models\MainModel;

class MainController
{
    /**
     * @var MainModel
     */
    private $model;
    protected $container;

    function __construct(DIContainerInterface $container, MainModel $model)
    {
        $this->container = $container;
        $this->model = $model;
    }

    public function index()
    {
        echo "Index Method";
    }

    public function login()
    {
        echo "Login Method";
    }

    public function hello(Request $request, Response $resp)
    {
        echo 'Hello this is ';
        echo $request->getMethod();
        echo " request ";
        echo "<pre>";
        print_r($request->getParams());
        echo "</pre>";
//        $my = $this->container->get('Models\MainModel');
//        print_r($my->getUsers());
    }

    public function showUsers()
    {
        $decodedUsers = $this->model->getUsers();
        echo "<pre>$decodedUsers</pre>";
    }
}