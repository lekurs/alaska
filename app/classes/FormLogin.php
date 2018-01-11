<?php
/**
 * Created by PhpStorm.
 * User: Bidule
 * Date: 29/11/2017
 * Time: 00:15
 */

namespace app\classes;


use app\lib\FormHelper;

class FormLogin extends FormHelper
{
    /**
     * @var formName => Nom du Formulaire
     */
    private $formName;
    public $icon;

    /**
     * FormLogin constructor.
     * @param $formName
     */
    public function __construct($formName)
    {
        $this->formName = $formName;
    }

    /**
     * @return string :
     */

    public function getFormName()
    {
        return 'Form' . $this->formName;
    }

    /**
     * @return string fermeture balise formulaire
     */

    public function formClose()
    {
        return $this->form_close();
    }

    /**
     * @return string : renvoie l'input email pour le formulaire de connection
     */

    public function inputLogin()
    {
        return $this->input_email('email', 'Email', 'Email', 'email', '', false);
    }

    /**
     * @return string : renvoie l'input password pour le formulaire de connection
     */

    public function inputPassLogin()
    {
        return $this->input_pass('password', 'password', '', 'password', '', false);
    }

    /**
     * @return string : renvoie le bouton de connection pour le formulaire de connection
     */

    public function inputSubmit()
    {
        return $this->input_submit('submit_log', '', '', 'submit', '', false);
    }
}