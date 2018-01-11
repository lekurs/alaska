<?php
/**
 * Created by PhpStorm.
 * User: Bidule
 * Date: 16/11/2017
 * Time: 15:29
 */

namespace app\classes;
use \PDO;

require_once 'Config.php';

class Database
{
    private $host;
    private $dbname;
    private $user;
    private $password;

    public function Connect()
    {
        $config = Config::getPDO();

        $this->host = $config['hostname'];
        $this->dbname = $config['dbname'];
        $this->user = $config['user'];
        $this->password = $config['password'];

        $db = new PDO('mysql:host=' . $this->host . '; dbname=' . $this->dbname.'; charset=utf8', $this->user, $this->password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

        return $db;

        throw new Exception('erreur');
    }
}