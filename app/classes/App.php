<?php
/**
 * Created by PhpStorm.
 * User: Bidule
 * Date: 27/11/2017
 * Time: 15:24
 */

namespace app\classes;


class App
{

    private static $_instance;
    private $db_instance;

    /**
     * @return mixed
     */
    public static function getInstance()
    {
        if(is_null(self::$_instance))
        {
            self::$_instance = new App();
        }
        return self::$_instance;
    }

    public function getDb()
    {
        $config = Config::getInstance();

        if(is_null($this->db_instance))
        {
            $this->db_instance = new Database($config->get('hostname'),  $config->get('dbname'), $config->get('user'), $config->get('password'));
        }
        return $this->db_instance;
    }
}