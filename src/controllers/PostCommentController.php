<?php
/**
 * Created by PhpStorm.
 * User: Bidule
 * Date: 13/12/2017
 * Time: 00:57
 */

namespace src\controllers;


use src\managers\CommentsManager;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Validation;

class PostCommentController extends Controllers
{
    public function __invoke($idChapter)
    {
        $request = Request::createFromGlobals();
        $session = new Session();

        $validator = Validation::createValidator();
        $commValidator = $validator->validate($request->get('post_commentaire'), array(
            new NotBlank(),
        ));

        $comm = new CommentsManager();
        $comm->getComments($idChapter);

        $build = [
                'idComments' => null,
                'comments' => $request->get('post_commentaire'),
                'report' => 0,
                'chapterId' => $idChapter,
                'userId' => $session->get('id'),
                'username' => $session->get('login')
        ];

        $newComm = $comm->buildComments($build);

        $response = new RedirectResponse('/chapter/'.$idChapter);

        if(count($commValidator) ==0)
        {
            $comm->addComment($newComm);
            $session->getFlashBag()->add('add_comment', 'Succès : Commentaire posté');
        }
        else {
            foreach($commValidator as $errors)
            {
                $session->getFlashBag()->add('violations_comment', 'Erreur : merci de remplir ce champ');
            }
        }
        $response->send();
    }
}