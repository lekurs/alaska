<?php
/**
 * Created by PhpStorm.
 * User: Bidule
 * Date: 30/11/2017
 * Time: 15:47
 */

namespace app\classes;


use app\lib\ControllerHelper;

class Router extends ControllerHelper
{
    private $routes = [];
    private $controllerHelper;

    public function __construct()
    {
        $this->createRoute();
    }

    public function createRoute()
    {
        $routes = require __DIR__ . '../../config/routes.php';

        foreach ($routes as $route)
        {
            $route = new Route($route['path'], $route['controller'], $route['method']);
            $this->routes[] = $route;

            $controller = new ControllerHelper();
            $controller->loadController($route->getController());

        }
    }

    public function catchParam($route, $request)
    {
        $route->matchUrl($request);
    }

    public function handleRequest($request)
    {
        foreach ($this->routes as $route)
        {
            switch ($request)
            {
                case $route->getPath() :
                    $controllerTab = new ControllerHelper();
                    $params =  $route->getParams();
                    $method = $route->getMethod();
                    if(!empty($params))
                    {
                        $controller = $controllerTab->getControllerName(array('controller' => $route->getController()),$params[0], $route->getMethod());
                        return $controller($params[0], $method);
                    }
                    else
                    {
                        $controller = $controllerTab->getControllerName(array('controller' => $route->getController()),'', $route->getMethod());
                        return $controller();
                    }
                    break;

            }
        }
        echo 'page introuvable';
    }
}