<?php
/**
 * Created by PhpStorm.
 * User: Bidule
 * Date: 07/12/2017
 * Time: 16:07
 */

namespace app\lib;


class ControllerHelper
{
    private $controllers;

    public function getControllers()
    {
        return $this->controllers;
    }

    public function loadController($controller)
    {
        return $this->controllers[$controller] = new $controller();
    }

    public function getControllerName($controller_name, $params, $method)
    {
        foreach ($controller_name as $controller)
        {
            if(empty($params))
            {
                $control = new $controller();
            }
            else
            {
                $control =  new $controller($params);
            }
        }
        return $control;
    }
}