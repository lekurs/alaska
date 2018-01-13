<?php
/**
 * Created by PhpStorm.
 * User: Bidule
 * Date: 13/01/2018
 * Time: 13:52
 */

namespace src\controllers;


use src\managers\CommentsManager;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\ValidatorBuilder;

class AdminUpdatingReportComment extends Controllers
{

    public function __invoke($idComments)
    {
        $commentManager = new CommentsManager();
        $request = Request::createFromGlobals();
        $session = new Session();

        $build = [
            'idComments' => $idComments,
            'comments' => $request->get('comments_area'),
            'report' => 0,
            'chapterId' => $request->get('chapterId'),
            'userId' => $request->get('userId'),
            'username' => $request->get('username'),
        ];

        $hydrate = $commentManager->buildComments($build);

        $validator = Validation::createValidator();

        $commentValidator = $validator->validate($request->get('comments_area'), array(
            new NotBlank(),
        ));

        if(count($commentValidator) ==0)
        {
            $commentManager->updateComment($hydrate);
            $session->getFlashBag()->add('updateMessageSuccess', '<strong>Success: </strong>Votre message à été mis à jour');
        }
        else {
            $session->getFlashBag()->add('updateMessageError', '<strong>Erreur: </strong>Votre message n\'à pas été mis à jour');
        }

        $response = new RedirectResponse('/admin/report');

        $response->send();
    }

}