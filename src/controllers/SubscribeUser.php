<?php
/**
 * Created by PhpStorm.
 * User: Bidule
 * Date: 13/11/2017
 * Time: 15:48
 */

namespace src\controllers;

use app\classes\Database;
use app\lib\QueryBuilder;
use src\managers\UserManager;
use Symfony\Component\HttpFoundation\Request;


class SubscribeUser extends Database
{
    public function __invoke()
    {
        $request = Request::createFromGlobals();
        $userManager = new UserManager();

        if($request->get('email_suscribe')) {

            $db = new QueryBuilder($this->Connect());
            $email = htmlspecialchars(strtolower($request->get('email_suscribe')));

            $result = $userManager->checkUser($email);

            if ($result == false) {
                $status = 'error';
                $message = 'Mail déjà utilisé';
            } else {
                $status = 'success';
                $message = 'Ce mail est disponible';
            }
        }
        else {
            $status = 'error';
            $message = 'Veuillez tapez votre email';
        }

        $data = array('status' => $status, 'message' => $message);
        echo json_encode($data);
    }
}


