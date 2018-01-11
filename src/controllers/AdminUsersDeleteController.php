<?php
/**
 * Created by PhpStorm.
 * User: Bidule
 * Date: 18/12/2017
 * Time: 09:13
 */

namespace src\controllers;


use PDO;
use src\managers\UserManager;
use src\models\User;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

class AdminUsersDeleteController extends Controllers
{

    public function __invoke($idUser)
    {
        $request = Request::createFromGlobals();
        $session = new Session();

        $userManger = new UserManager();

        $build = [
                            'idUser' => $idUser,
                            'username' => $request->get('username'),
                            'password' => null,
                            'email' => null,
                            'role' => $request->get('rank')
        ];

        $delete = $userManger->buildUsers($build);

        $userManger->delUser($delete);

        if(PDO::ERR_NONE == 00000)
        {
            $session->getFlashBag()->add(
                'addUser_Success',
                '<strong>Succès : </strong>Utilisateur supprimé'
            );
        }
        else {
            $session->getFlashBag()->add('addUser_errror', '<strong>Erreur : </strong>Une erreur est survenue');
        }

//        var_dump($session->getFlashBag());

        $response = new RedirectResponse('/admin/users');
        $response->send();
    }
}