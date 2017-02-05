<?php

class Router {


    private $routeList = array(
        'login' => array('controller' => 'user', 'action' => 'loginPage'),
        'logout' => array('controller' => 'user', 'action' => 'logout'),
        'cars' => array('controller' => 'data', 'action' => 'all'),
        'data-honda' => array('controller' => 'data', 'action' => 'filter', 'parameter' => array('make' => 'honda')),
        '' => array('controller' => 'display', 'action' => 'all'),
        'hondas' => array('controller' => 'display', 'action' => 'hondas'),
    );
    
    function __construct($path) {
        if (is_array($this->routeList[$path])) {
            $this->controller = $this->routeList[$path]['controller'];
            $this->action = $this->routeList[$path]['action'];
            $this->parameter = $this->routeList[$path]['parameter'];
        } else {
            $this->controller = 'system';
            $this->action = 'errorPage';
        }
    }

    function go() {
        $controllerClassName = ucfirst($this->controller).'Controller';
        $controllerAction = $this->action;
        $controller = new $controllerClassName;

        $controller->$controllerAction($this->parameter);
    }

    function getController() {
        return $this->controller;
    }
    function getAction() {
        return $this->action;
    }
}
