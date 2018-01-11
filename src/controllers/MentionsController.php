<?php
/**
 * Created by PhpStorm.
 * User: Bidule
 * Date: 10/01/2018
 * Time: 21:56
 */

namespace src\controllers;


use app\classes\Database;

class MentionsController extends Database
{
    public function __invoke()
    {
        setcookie("mention","true",time()+ 365 * 24 * 3600, '/');
    }
}