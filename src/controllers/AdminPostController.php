<?php
/**
 * Created by PhpStorm.
 * User: Bidule
 * Date: 14/12/2017
 * Time: 18:21
 */

namespace src\controllers;


use app\classes\FormFactory;
use src\managers\MenusManager;
use Symfony\Component\HttpFoundation\Session\Session;

class AdminPostController extends Controllers
{
    public function __invoke()
    {
        $menuManager = new MenusManager();
        $menu = $menuManager->getMenus();
        $session = new Session();

        $formPost = FormFactory::createForm('postChapter');

        $title = 'Admin - Poster un Chapitre';

        if($session->has('login') && $session->get('rank')== 1 || $session->get('rank') == 3)
        {
            $this->view('/admin/adminPostView', compact('menu', 'title', 'formPost'));
        }
        else {
            echo "Vous n'avez pas les droits suffisants";
        }
    }
}