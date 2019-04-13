<?php


namespace Controllers;


use Jedi\Interfaces\DIContainerInterface;

class PersonController
{
    protected $container;

    public function __construct(DIContainerInterface $container)
    {
        $this->container = $container;
    }

    public function __invoke($req, $resp)
    {

    }

    public function index(){
        echo 'persons: ';
        $model = $this->container->get('Models\MainModel');;
        print_r($model->getUsers());
    }

}