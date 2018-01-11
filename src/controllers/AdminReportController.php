<?php
/**
 * Created by PhpStorm.
 * User: Bidule
 * Date: 14/12/2017
 * Time: 23:05
 */

namespace src\controllers;

use src\managers\ChaptersManager;
use src\managers\CommentsManager;
use src\managers\MenusManager;
use src\models\Chapters;
use Symfony\Component\HttpFoundation\Session\Session;

class AdminReportController extends Controllers
{

    public function __invoke()
    {
        $menuManager = new MenusManager();
        $menu = $menuManager->getMenus();
        $session = new Session();

        $commentManager = new CommentsManager();

        $report = $commentManager->getReportByChapter();
        $chapterManager = new ChaptersManager();
        $commReport = $chapterManager->getChaptersWithReport();

        $title = "Gestion des commentaires signalés";

        if($session->has('login') && $session->get('rank')== 1 || $session->get('rank') == 3)
        {
            $this->view('/admin/adminReportView', compact('menu', 'title', 'report', 'chapter', 'commReport'));
        }
        else {
            echo "Vous n'avez pas les droits suffisants";
        }
    }

}