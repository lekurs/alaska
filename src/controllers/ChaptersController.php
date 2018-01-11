<?php
/**
 * Created by PhpStorm.
 * User: Bidule
 * Date: 30/11/2017
 * Time: 23:48
 */

namespace src\controllers;

use src\managers\ChaptersManager;
use src\managers\CommentsManager;
use app\classes\FormFactory;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;


class ChaptersController extends Controllers
{

    public function __invoke()
    {
        $chapterManager = new ChaptersManager();
        $chapters = $chapterManager->getChapters();
        
        $title = 'Billet pour l\'Alaska - Jean FORTEROCHE';

        $this->view('/showChaptersView', compact('chapters', 'title'));
    }

}