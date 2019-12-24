<?php

namespace base\routing;

class Router
{
    /**
     * @var $method - [ALL, GET, POST, PUT]
     * @var $link - строка с url
     * @var $controller - класс обработчика
     * @var $action - метод класса обработчика
     *
     * @var $path array - массив строк между / в url
     * @var $countOfPath - количество элементов $path
     */
    private $method;
    private $link;
    private $controller;
    private $action;

    public $path;
    public $countOfPath;

    /**
     * Router constructor.
     * @param $method
     * @param $link
     * @param $controller
     * @param $action
     */
    public function __construct($method, $link, $controller, $action)
    {
        $this->method = $method;
        $this->link = $link;
        $this->controller = $controller;
        $this->action = $action;

        $this->path = explode("/", $link);
        $this->countOfPath = count($this->path);
    }

    /**
     * @return mixed
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * @return mixed
     */
    public function getController()
    {
        return $this->controller;
    }

    /**
     * @return mixed
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * @return mixed
     */
    public function getMethod()
    {
        return $this->method;
    }
}