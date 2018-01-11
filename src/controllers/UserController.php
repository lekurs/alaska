<?php
/**
 * Created by PhpStorm.
 * User: Bidule
 * Date: 11/12/2017
 * Time: 15:16
 */

namespace src\controllers;
use src\managers\UserManager;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Validation;

class UserController extends Controllers
{
    public function __invoke()
    {
        $request = Request::createFromGlobals();
        $userManager = new UserManager();
        $reponse = new RedirectResponse('/');
        $response = new Response();


        $session = new Session();

        $validator = Validation::createValidator();

        $violations = $validator->validate($request->get('email'), array(
                    new NotBlank(),
                    new Email(),
        ));

        if(count($violations) == 0)
        {
            $users = $userManager->login(htmlspecialchars($request->get('email')));

            foreach ($users as $user) {
                if (password_verify($request->get('password'), $user->password())) {
                    $session->set('login', $user->username());
                    $session->set('email', $user->email());
                    $session->set('id', $user->idUser());
                    $session->set('rank', $user->role());
                    $session->getFlashBag()->add('log_success', '<strong>Succès : </strong>Vous êtes connecté');

                    $response->headers->setCookie(new Cookie('login', 'login', time()+365*24*3600));
                }
            }
        }
        else {
            foreach($violations as $violation)
            {
                $session->getFlashBag()->add('log_error', '<strong>Erreur : </strong>Impossible de vous connecter, vérifiez vos identifiants');
            }
        }
        $reponse->send();
    }
}