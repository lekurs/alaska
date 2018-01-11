<?php
/**
 * Created by PhpStorm.
 * User: Bidule
 * Date: 30/11/2017
 * Time: 16:01
 */

namespace app\classes;


class Route
{
        private $path;
        private $controller;
        private $method;
        private $params;

        public function __construct($path, $controller, $method)
        {
            $this->path = $path;
            $this->controller = $controller;
            $this->method = $method;
        }

        public function getPath()
        {
            $this->matchUrl($_SERVER["REQUEST_URI"]);
            return  $this->path;

        }

        public function getController()
        {
            return $this->controller;
        }

        public function getMethod()
        {
            return $this->method;
        }

        public function setParams($params)
        {
            $this->params = $params;
            if(!empty($params))
            {
            $path = preg_replace('#:([\w]+)#', $this->params[0], $this->path);

                $this->path = $path;
            }
            else
            {
                $params = null;
            }
        }


        public function getParams()
        {
                return $this->params;
        }

        public function matchUrl($url)
        {
            $path = preg_replace('#:([\w]+)#', '([^/]+)', $this->path);

            $regex = "#^$path$#i";

            if (!preg_match($regex, $url, $match)) {
                return false;
            }
            array_shift($match);

            $this->setParams($match);

        }
}