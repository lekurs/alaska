<?php
/**
 * Created by PhpStorm.
 * User: Bidule
 * Date: 15/12/2017
 * Time: 15:40
 */

namespace src\controllers;

use src\managers\CommentsManager;
use src\managers\MenusManager;
use Symfony\Component\HttpFoundation\Session\Session;

class AdminUpdateReportComment extends Controllers
{
    public function __invoke($idComment)
    {
        $menuManager = new MenusManager();
        $menu = $menuManager->getMenus();
        $session = new Session();

        $commentManager = new CommentsManager();
        $comment = $commentManager->getReportComment($idComment);

        $title = "Messages signalés : ".$idComment;

        if($session->has('login') && $session->get('rank')== 1 || $session->get('rank') == 3)
        {
            $this->view('admin/adminUpdateReportView', compact('menu', 'title', 'comment'));
        }
        else {
                echo "Vous n'avez pas les droits suffisants";
        }
    }
}