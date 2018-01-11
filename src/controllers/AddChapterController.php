<?php
/**
 * Created by PhpStorm.
 * User: Bidule
 * Date: 14/12/2017
 * Time: 21:13
 */

namespace src\controllers;


use src\managers\ChaptersManager;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Validation;

class addChapterController extends Controllers
{
    public function __invoke()
    {
        $request = Request::createFromGlobals();
        $chapterManager = new ChaptersManager();
        $session = new Session();

        $build = [
                            'idChapter' => null,
                            'title' => htmlspecialchars($request->get('title')),
                            'chapter' => $request->get('chapitre_area'),
                            'online' => $request->get('online'),
                            'create_date' => null
                        ];

        $add = $chapterManager->buildChapters($build);

        $validator = Validation::createValidator();

        $titleValidation = $validator->validate($request->get('title'), array(
                    new NotBlank(),
        ));

        $chapterValidation = $validator->validate($request->get('chapitre_area'), array(
                    new NotBlank(),
        ));

        if(count($titleValidation) == 0 && count($chapterValidation) == 0)
        {
            $chapterManager->addChapter($add);

            $session->getFlashBag()->add('addChapter_success', '<strong>Succès : </strong>Le chapitre à bien été enregistré');
        }
        else {
            foreach($titleValidation as $errorTitle)
            {
                $session->getFlashBag()->add('addChapter_error', '<strong>Erreur : </strong>Merci de remplir le champ');
            }

            foreach($chapterValidation as $errorChapter)
            {
                $session->getFlashBag()->add('addChapter_error', '<strong>Erreur : </strong>Merci de remplir le champ');
            }
        }

        $response = RedirectResponse::create('/admin');

        $response->send();

    }
}