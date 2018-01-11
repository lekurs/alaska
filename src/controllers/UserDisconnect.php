<?php
/**
 * Created by PhpStorm.
 * User: Bidule
 * Date: 12/12/2017
 * Time: 01:01
 */

namespace src\controllers;


use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

class UserDisconnect
{
    public function __invoke()
    {
                $reponse = new RedirectResponse('/');
                $session = new Session();
                $session->clear();
                $reponse->send();
    }
}