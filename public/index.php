<?php
/**
 * Created by PhpStorm.
 * User: Bidule
 * Date: 24/11/2017
 * Time: 11:37
 */

use src\managers\ChaptersManager;
use Symfony\Component\HttpFoundation\Session\Session;

require '../vendor/autoload.php';

define ('ROOT', dirname(__DIR__));

$router = new \app\classes\Router();

$session = new Session();
$session->start();

$router->handleRequest($_SERVER['REQUEST_URI']);
