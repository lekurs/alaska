<?php
/**
 * Created by PhpStorm.
 * User: Bidule
 * Date: 28/11/2017
 * Time: 09:22
 */

namespace src\managers;

use app\classes\Database;

use app\lib\QueryBuilder;
use src\models\Menus;
use PDO;

class MenusManager extends Database
{
    /**
     * tableau data
     * @var array
     */
    private $data = [];

    /**
     * Récupération des menus en bdd
     * @return array
     */

    public function getMenus()
    {
        $db = new QueryBuilder($this->Connect());

        $req = $db->type('select')
                            ->select('*')
                            ->from('menus')
                            ->orderBy('id_menus', 'ASC');

        $result = $req->fetchAll();

        foreach($result as $data)
        {
            $menu = $this->buildMenus($data);
            $this->data[] = $menu;
        }

        return $this->data;
    }

    /**
     * hydratate Menus
     * @param array $data
     * @return Menus
     */

    private function buildMenus(array $data)
    {
        $model = new Menus();

        $model->setIdMenus($data['id_menus']);
        $model->setLien($data['lien']);
        $model->setMenus($data['menus']);
        return $model;
    }}