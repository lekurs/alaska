<?php
/**
 * Created by PhpStorm.
 * User: Bidule
 * Date: 07/12/2017
 * Time: 21:35
 */

namespace src\controllers;


use app\classes\FormFactory;
use src\managers\ChaptersManager;
use src\managers\CommentsManager;
use Symfony\Component\HttpFoundation\Session\Session;

class ChapterController extends Controllers
{
        public function __invoke($idChapter)
        {
            $chapterOne = new ChaptersManager();

            $showChapter = $chapterOne->getChapter($idChapter);
            $commentManager = new CommentsManager();
            $comments = $commentManager->getComments($idChapter);
            $nbComment = $commentManager->nb_comment($idChapter);

            $title = "Bienvenue en Alaska - Chapitre N° " .$idChapter;

            $this->view('/showChapterView', compact('showChapter', 'comments', 'nbComment', 'title', 'commentManager', 'idChapter'));
        }
}
