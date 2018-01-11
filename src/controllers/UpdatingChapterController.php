<?php
/**
 * Created by PhpStorm.
 * User: Bidule
 * Date: 15/12/2017
 * Time: 14:13
 */

namespace src\controllers;


use src\managers\ChaptersManager;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Validation;

class UpdatingChapterController extends Controllers
{
    public function __invoke()
    {
        $chapterManager = new ChaptersManager();
        $request = Request::createFromGlobals();
        $session = new Session();

        $build = [
                            'idChapter' => htmlspecialchars($request->get('idChapter')),
                            'chapter' => $request->get('chapitrearea'),
                            'title' => htmlspecialchars($request->get('title')),
                            'online' => $request->get('online'),
                            'create_date' => null
        ];

        $hydrate = $chapterManager->buildChapters($build);

        $validator = Validation::createValidator();

        $idValidator = $validator->validate($request->get('idChapter'), array(
                    new NotBlank(),
        ));

        $chapterValidator = $validator->validate($request->get('chapitrearea'), array(
                    new NotBlank(),
        ));

        $titleValidator = $validator->validate($request->get('title'), array(
                    new NotBlank(),
        ));

        if(count($idValidator) == 0 && count($chapterValidator) == 0 && count($titleValidator) ==0)
        {
            $chapterManager->updateChapter($hydrate);
            $session->getFlashBag()->add('updateChap_success', '<strong>Success: </strong>Votre message à été mis à jour');
        }
        else {
            foreach($idValidator as $errorsId)
            {
                $session->getFlashBag()->add('updateChap_error', '<strong>Erreur : </strong>merci de remplir le champ');
            }

            foreach($chapterValidator as $errorsChapters)
            {
                $session->getFlashBag()->add('updateChap_error', '<strong>Erreur : </strong>merci de remplir le champ');
            }

            foreach($titleValidator as $errorsTitle)
            {
                $session->getFlashBag()->add('updateChap_error', '<strong>Erreur : </strong>merci de remplir le champ');
            }
        }

        $response = new RedirectResponse('/admin');

        $response->send();
    }

}