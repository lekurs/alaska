<?php
/**
 * Created by PhpStorm.
 * User: Bidule
 * Date: 04/12/2017
 * Time: 16:35
 */

namespace app\config;


use app\classes\FormFactory;
use src\managers\CommentsManager;
use Symfony\Component\HttpFoundation\Session\Session;

class ConfigController
{
    protected $viewPath;
    protected $layout;

    protected function view($view, $data = [])
    {
        $session = new Session();
        $session->start();
        $commentManager = new CommentsManager();
        $countReport = $commentManager->countAllReport();
        $form = FormFactory::createForm('login');
        $formSuscribe = FormFactory::createForm('suscribe');

        $form = FormFactory::createForm('login');
        $formSuscribe = FormFactory::createForm('suscribe');
        $formComment = FormFactory::createForm('comment');

        ob_start();
        extract($data);

        require ($this->viewPath . str_replace('.', '/', $view) . '.php');

        $content = ob_get_clean();

        require ($this->viewPath . 'template/' .$this->layout . '.php');
    }
}