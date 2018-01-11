<?php
/**
 * Created by PhpStorm.
 * User: Bidule
 * Date: 28/11/2017
 * Time: 10:56
 */

namespace app\lib;


class FormHelper
{

    private $options;
    public $tag = 'p';
    public $icon;


    /**
     * @param $html => le html à afficher
     * @return string => renvoie le tag entourant la balise input
     */

    private function tags($html)
    {
        return "<{$this->tag}>{$html}</{$this->tag}>";
    }

    public function form_open($method, $action, $id=null)
    {
        return '<form method="' . $method . '" action="'.$action.'" id="' . $id .'">';
    }

    public function form_close()
    {
        return '</form>';
    }

    public function setIcon($class_name)
    {
        return '<i class="' . $class_name . '"></i>';
    }

    /**
     * @function input
     * @param $name
     * @param $placeholder
     * @param $class => optionnel, si besoin d'une classe
     *  @param $id => optionnel
     * @param $attr => attributs du l'input
     * @param $tag => false = pas de tag
     * @return string => affiche l'input
     */

    public function input_pass($name, $placeholder, $class = null, $id = null, $attr = null, $tag)
    {
        if($tag === false)
        {
            return '<input type="password" name="' . $name . '" placeholder ="' . $placeholder . '" class="'. $class .'" id="' . $id . '" '.$attr.' />';
        }
        else
        {
            return $this->tags('<input type="password" name="' . $name . '" placeholder ="' . $placeholder . '" class="'. $class .'" id="' . $id . '" '.$attr.' />');
        }
    }


    /**
     * @function input
     * @param $name
     * @param $placeholder
     * @param $class => optionnel, si besoin d'une classe
     *  @param $id => optionnel
     * @param $attr => attributs du l'input
     * @param $tag => pas de tag
     * @return string => affiche l'input
     */

    public function input_email($name, $placeholder, $class = null, $id = null, $attr = null, $tag)
    {
        if($tag === false)
        {
            return '<input type="email" name="' . $name . '" placeholder ="' . $placeholder . '" class="'. $class .'" id="' . $id . '" '.$attr.' />';
        }
        else
        {
            return $this->tags('<input type="email" name="' . $name . '" placeholder ="' . $placeholder . '" class="'. $class .'" id="' . $id . '" '.$attr.' />');
        }
    }

    /**
     * @function input
     * @param $name
     * @param $placeholder
     * @param $value = null
     * @param $class => optionnel, si besoin d'une classe
     *  @param $id => optionnel
     * @param $attr => attributs du l'input
     * @param $tag = optionnel
     * @return string => affiche l'input
     */

    public function input_txt($name, $placeholder, $value=null,  $class = null, $id = null, $attr = null, $tag)
    {
        if($tag === false)
        {
            return "<input type=\"text\" name=\"$name\" value=\"$value\" placeholder =\"$placeholder\" class=\"$class\" id=\"$id\" $attr />";
        }
        return $this->tags("<input type=\"text\" name=\" $name\" placeholder=\"$placeholder\" value=\"$value\" class=\"$class\" id=\"$id\" .$attr />");
    }

    public function input_hidden($name, $value, $class = null, $id = null, $attr = null, $tag)
    {
        if($tag === false)
        {
            return '<input type="hidden" name="' . $name . '" value="' . $value . '" class="'.$class.'" class="'. $class .'" id="' . $id . '" '.$attr.' />';
        }
        return $this->tags('<input type="hidden" name="' . $name . '" value="' . $value . '" class="'.$class.'" class="'. $class .'" id="' . $id . '" '.$attr.' />');
    }


    /**
     * @function input
     * @param $name
     * @param $placeholder
     * @param $class => optionnel, si besoin d'une classe
     *  @param $id => optionnel
     * @param $value=null
     * @return string => affiche l'input
     */

    public function input_area($name, $placeholder, $value=null, $class = null, $id = null, $tag)
    {
        if($tag === false)
        {
            return "<textarea name=\"$name\" placeholder=\"$placeholder\" class=\"$class\" id=\"$id\">$value</textarea>";
//            return '<textearea type="text" name="' . $name . '" placeholder ="' . $placeholder . '" class="'. $class .'" id="' . $id . '" '.$attr.'></textarea>';
        }
        return $this->tags("<textarea name=\"$name\" value=\"$value\" placeholder=\"$placeholder\" class=\"$class\" id=\"$id\">$value</textarea>");
    }

    /**
     * @param $name
     * @param null $class
     * @param null $id
     * @param $tag = null
     * @param $value
     * @return string
     */

    public function input_box($name, $id = null, $class = null, $value, $attr=null, $tag = false)
    {
        if($tag === false)
        {
            return "<input type=checkbox name=\"$name\" id=\"$id\" class=\"$class\" value=\"$value\" $attr  />";
        }
        else
            {
                return $this->tags("<input type=\"checkbox\" name=\"$name\" id=\"$id\" class=\"$class\" value=\"$value \" />");
            }
    }

    /**
     * @param $name
     * @param null $class
     * @param null $id
     * @param  $tag
     * @param null $attr
     * @return string
     */

    public function input_radio($name, $id = null, $class = null, $attr = null, $tag = false)
    {
        if($tag === false)
        {
            return "<input type=\"radio\" name=\"$name\" id=\"$id\" class=\"$class\" '.$attr.'  />";
        }
        else
        {
            return $this->tags("<input type=\"radio\" name=\"$name\" id=\"$id\" class=\"$class\" '.$attr.'  />");
        }
    }


    /**
     * @param $name
     * @param null $class
     * @param null $id
     * @return string
     */

    public function select($name, $class = null, $id = null)
    {
        return "<select name=\"$name\"class=\"$class\" id=\"$id\"><option>".$this->options."</option></select>";
    }

    /**
     * @return mixed
     */

    public function getOptions()
    {
        return $this->options;
    }

    /**
     * @param $values = array()
     * @return array
     */

    public function optSelect(array $values)
    {
        foreach($values as $key => $value) {
             $this->options = "<option value=\".$key.\">".$values[$key]."</option>";
        }
        return $this->options;
    }


    /**
     * @param $name
     * @param $value
     * @param null $class
     * @param null id
     * @param null $attr
     * @return string
     */

    public function input_submit($name, $value, $class = null, $id = null, $attr = null, $tag)
    {
        if($tag === false)
        {
            return "<input type=\"submit\" name=\"$name\" value=\" $value\" class=\"$class\" id=\"$id\" ".$attr." />";
        }
        return $this->tags("<input type=\"submit\" name=\"$name\" value=\"$value\" class=\"$class\" ".$attr. "/>");
    }

}