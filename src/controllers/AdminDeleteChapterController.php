<?php
/**
 * Created by PhpStorm.
 * User: Bidule
 * Date: 14/12/2017
 * Time: 23:10
 */

namespace src\controllers;


use src\managers\ChaptersManager;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Validation;
use Webmozart\Assert\Assert;

class AdminDeleteChapterController extends Controllers
{

    public function __invoke($idChapter)
    {
        $request = Request::createFromGlobals();
        $session = new Session();

        $chapterManager = new ChaptersManager();

        $build = [
            'idChapter' => htmlspecialchars($idChapter),
            'title' => null,
            'chapter' => null,
            'online' => null,
            'create_date' => null
        ];

        $delChapter = $chapterManager->buildChapters($build);

        $validator = Validation::createValidator();

        $violations = $validator->validate($idChapter, array(
                new NotNull(),
                new NotBlank(),
        ));

        if(count($violations) == 0)
        {
        $chapterManager->delChapter($delChapter);
        $session->getFlashBag()->add('delChapter_success', '<strong>Succès : </strong>Le chapitre à bien été supprimé');
        }
        else {
            foreach($violations as $violation)
            {
                echo $violation->getMessage() .'<br>.'; //A modifier avec flash
            }
        }

        $response = RedirectResponse::create('/admin');
        $response->send();
    }
}