<?php
/**
 * Created by PhpStorm.
 * User: Bidule
 * Date: 14/12/2017
 * Time: 11:19
 */

namespace src\controllers;

use src\managers\ChaptersManager;
use src\managers\CommentsManager;
use src\managers\MenusManager;
use src\managers\UserManager;
use Symfony\Component\HttpFoundation\Session\Session;

class AdminIndexController extends Controllers
{
    public function __invoke()
    {
        $menuManager = new MenusManager();
        $menu = $menuManager->getMenus();

        $chapterManager = new ChaptersManager();
        $chapters = $chapterManager->getChapters();

        $commentManager = new CommentsManager();
        $countReport = $commentManager->countAllReport();

        $chapterOffline = $chapterManager->chapterOffline();

        $countChapter = $chapterManager->countChapter();

        $userManager = new UserManager();
        $lastUsers = $userManager->getLastUser();
        $maxUser = $userManager->getMaxUsers();

        $session = new Session();

        $title = 'Billet pour l\'Alaska - Administration';

        /******************************************** GESTION DES MESSAGES FLASH **************************************************
         * */

        foreach($session->getFlashBag()->get('addChapter_success', array()) as $message)
        {
            echo '<div class="flash-notice_success">'.$message.'</div>';
        }

        foreach($session->getFlashBag()->get('addChapter_error', array()) as $message)
        {
            echo '<div class="flash-notice_error">'.$message.'</div>';
        }

        foreach($session->getFlashBag()->get('updateChap_success', array()) as $message)
        {
            echo '<div class="flash-notice_success">'.$message.'</div>';
        }

        foreach($session->getFlashBag()->get('updateChap_error', array()) as $message)
        {
            echo '<div class="flash-notice_error">'.$message.'</div>';
        }

        if($session->has('login') && $session->get('rank')== 1 || $session->get('rank') == 3)
        {
           $this->view('/admin/adminView', compact('title','menu', 'chapters', 'countReport', 'chapterOffline', 'countChapter', 'lastUsers', 'maxUser',  'commentManager'));
        }
        else {
            echo "Vous n'avez pas les droits suffisants";
        }
    }
}