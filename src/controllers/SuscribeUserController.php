<?php
/**
 * Created by PhpStorm.
 * User: Bidule
 * Date: 18/12/2017
 * Time: 15:45
 */

namespace src\controllers;


use src\managers\UserManager;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Validation;

class SuscribeUserController extends Controllers
{

    public function __invoke()
    {
        $userManager = new UserManager();

        $request = Request::createFromGlobals();
        $response = RedirectResponse::create('/');
        $session = new Session();

        $build = [
                'idUser' => null,
                'email' =>htmlspecialchars($request->get('email_suscribe')),
                'password' => password_hash($request->get('password'), PASSWORD_DEFAULT),
                'username' => htmlspecialchars($request->get('login')),
                'role' => 2
        ];

        $add = $userManager->buildUsers($build);

        $validator = Validation::createValidator();

        $emailValidator = $validator->validate($request->get('email_suscribe'), array(
            new Email(),
            new NotBlank(),
            new Regex(array(
                'pattern' => '/.+@.+\..+/',
            )),
        ));

        $passValidator = $validator->validate($request->get('password'), array(
            new NotBlank(),
//            new Length('5'),
            new Regex(array(
                'pattern' => ' /^[A-Z]+[a-zA-Z0-9?!\/\\,;:!{}[\]()-_@.]\S/'
            )),
        ));

        if(count($emailValidator) == 0 && count($passValidator) == 0)
        {
            //un seul mail possible
            $checkUser = $userManager->checkUser($request->get('email_suscribe'));

            if($checkUser == true)
            {
                $userManager->inscription($add);
                $session->getFlashBag()->add('newUser_succes', '<strong>Succès : </strong>Vous êtes désormais enregistré, vous pouvez vous connecter');
            }
            else {
                $session->getFlashBag()->add('newUser_error', '<strong>Error : </strong>Email déjà utilisé, merci d\'en sélectionner un nouveau');

            }
        }
        else {
            foreach($emailValidator as $emailError)
            {
                $session->getFlashBag()->add('newUser_badField', '<strong>Erreur</strong>Merci de remplir les champs correctement');
            }
            foreach($passValidator as $passError)
            {
                $session->getFlashBag()->add('newUser_badField', '<strong>Erreur</strong>Merci de remplir les champs correctement');
            }
        }
        $response->send();
    }
}