<?php
/**
 * Created by PhpStorm.
 * User: Bidule
 * Date: 14/12/2017
 * Time: 22:31
 */

namespace src\controllers;


use app\classes\FormFactory;
use src\managers\ChaptersManager;
use src\managers\MenusManager;

class updateChapterController extends Controllers
{
    public function __invoke($idChapter)
    {
        $menuManager = new MenusManager();
        $menu = $menuManager->getMenus();

        $chapterManager = new ChaptersManager();
        $chapter = $chapterManager->getChapter($idChapter);

        $formUpdate = FormFactory::createForm('UpdateChapter');

        $title = "Mise à jour du Chapitre " .$idChapter;

        $this->view('/admin/adminUpdateChapterView', compact('chapter','menu', 'title', 'formUpdate'));
    }
}