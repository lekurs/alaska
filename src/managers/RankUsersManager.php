<?php
/**
 * Created by PhpStorm.
 * User: Bidule
 * Date: 28/11/2017
 * Time: 09:33
 */

namespace src\managers;

use app\classes\Database;
use app\lib\QueryBuilder;
use src\models\RankUsers;
use PDO;

class RankUsersManager extends Database
{

    private $data = [];

    /**
     * Récupération des rangs utilisateurs en bdd
     * @return array
     */
    public function getRank()
    {
        $db = new QueryBuilder($this->Connect());

        $req = $db->type('select')
                            ->select('id, role')
                            ->from('role')
                            ->orderBy('role', 'ASC');

        $result = $req->fetchAll();

        foreach($result as $data)
        {
            $rank = $this->buildRankUsers($data);
            $this->data[] = $rank;
        }
        return $this->data;
    }

    /**
     * hydrate des rags utilisateurs
     * @param array $data
     * @return RankUsers
     */
    private function buildRankUsers(array $data)
    {
        $model = new RankUsers();

        $model->setId($data['id']);
        $model->setRole($data['role']);

        return $model;
    }
}