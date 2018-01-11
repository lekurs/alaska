<?php
/**
 * Created by PhpStorm.
 * User: Bidule
 * Date: 14/12/2017
 * Time: 20:53
 */

namespace app\classes;


use app\lib\FormHelper;

class FormPostChapter extends FormHelper
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

    public function input_title()
    {
        return $this->input_txt('title', 'Titre', '', '', 'title', '',false);
    }

    public function area_chapter()
    {
        return $this->input_area('chapitre_area', 'Votre Texte :', '', '','chapitre_area',false);
    }

    public function check_chapter()
    {
        return $this->input_box('online[]', 'online', '', 'online', '',false);
    }

    public function submit_chapter()
    {
        return $this->input_submit('reccord_chapter', 'Enregistrer', 'sub-btn', 'reccord_chapter', '', true);
    }
}