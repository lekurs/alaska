<?php
/**
 * Created by PhpStorm.
 * User: Bidule
 * Date: 14/12/2017
 * Time: 12:11
 */

namespace app\classes;


use app\lib\FormHelper;

class FormComment extends FormHelper
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

    public function areaComment()
    {
        return $this->input_area('post_commentaire', 'Tapez votre commentaire ici :', '', '', 'post_commentaire', false);
    }
}