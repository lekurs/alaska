<?php
/**
 * Created by PhpStorm.
 * User: Bidule
 * Date: 04/01/2018
 * Time: 16:48
 */

namespace src\controllers;


use app\classes\Database;
use src\managers\UserManager;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Validation;

class AdminUsersUpdateRankController extends Database
{

    public function __invoke()
    {
        $request = Request::createFromGlobals();
        $session = new Session();

        $userManager = new UserManager();
        $build = [
           'idUser' => $request->get('idUser'),
           'username' => null,
            'email' => null,
            'password' => null,
            'role' => $request->get('rankUser')
        ];

        $validator = Validation::createValidator();

        $idValidator = $validator->validate($request->get('rankUser'), array(
            new NotBlank(),
        ));

        if(count($idValidator > 0))
        {
        $user = $userManager->buildUsers($build);
        $update = $userManager->upRankUser($user);

        $session->getFlashBag()->add('update_user_success', '<strong>Success: </strong>Utilisateur mis à jour');
        }

        $response = new RedirectResponse('/admin/users');

        $response->send();

    }
}