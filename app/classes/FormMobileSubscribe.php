<?php
/**
 * Created by PhpStorm.
 * User: Bidule
 * Date: 10/01/2018
 * Time: 11:58
 */

namespace app\classes;


use app\lib\FormHelper;

class FormMobileSubscribe extends FormHelper
{
    private $formName;
    public $icon;

    /**
     * FormSuscribe constructor.
     * @param $formName
     */

    public function __construct($formName)
    {
        $this->formName = $formName;
    }

    /**
     * @return string
     */

    public function getFormName()
    {
        return 'Form' . $this->formName;
    }

    /**
     * @return string Renvoie le formulaire ainsi que l'action pour le formulaire d'inscription
     */

    public function formStart()
    {
        return $this->form_open('post', '/register', 'subscribe-mobile-form');
    }

    /**
     * @return string : renvoie la balise de fermeture du formulaire
     */

    public function formClose()
    {
        return $this->form_close();
    }

    /**
     * @return string : input email pour formulaire d'inscription
     */

    public function inputEmailSuscribe()
    {
        return $this->input_email('email_suscribe', 'email@email.com', '', 'email_mobile_suscribe', 'required', false);
    }

    /**
     * @return string : input text pour le formulaire d'inscription
     */

    public function inputTxtSuscribe()
    {
        return $this->input_txt('login', 'Pseudonyme', '', '', 'login_mobile', 'required',false);
    }

    /**
     * @return string : input password pour le formulaire d'inscription
     */

    public function inputPassSuscribe()
    {
        return $this->input_pass('password', 'password', '', 'password_mobile_suscribe', 'required', false);
    }

    /**
     * @return string : bouton d'envoie du formulaire d'inscription
     */

    public function inputSubmitSuscribe()
    {
        return $this->input_submit('submit', '', '', 'submit_mobile_suscribe_btn', '', false);
    }
}