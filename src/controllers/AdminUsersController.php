<?php
/**
 * Created by PhpStorm.
 * User: Bidule
 * Date: 18/12/2017
 * Time: 08:56
 */

namespace src\controllers;

use src\managers\MenusManager;
use src\managers\RankUsersManager;
use src\managers\UserManager;
use Symfony\Component\HttpFoundation\Session\Session;

class AdminUsersController extends Controllers
{
    public function __invoke()
    {
       $menuManager = new MenusManager();
       $menu = $menuManager->getMenus();

       $session = new Session();

       $userManager = new UserManager();
       $users = $userManager->getRankUser();
       $ranks = $userManager->getRankName();
        $title = 'Gestion utilisateurs';

       foreach($session->getFlashBag()->get('delUser_success', array()) as $message)
       {
           echo '<div class="flash-notice_success">'.$message.'</div>';
       }

       foreach($session->getFlashBag()->get('delUser_error', array()) as $message)
       {
           echo '<div class="flash-notice_error">'.$message.'</div>';
       }

        if($session->has('login') && $session->get('rank')== 1 || $session->get('rank') == 3)
        {
            $this->view('admin/adminUsersView', compact('menu', 'title', 'ranks', 'userManager', 'users'));
        }
        else {
            echo "Vous n'avez pas les droits suffisants";
        }
    }

}