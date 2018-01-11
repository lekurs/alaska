<?php
/**
 * Created by PhpStorm.
 * User: Bidule
 * Date: 29/11/2017
 * Time: 00:14
 */

namespace app\classes;


class FormFactory
{
    /**
     * @param $formName => Nom du formulaire
     * @return mixed => instance de formulaire
     */
    public static function createForm($formName)
    {
        $class_name = '\\app\\classes\\Form'.ucfirst($formName);
        return new $class_name($formName);
    }
}