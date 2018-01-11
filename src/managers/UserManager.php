<?php
/**
 * Created by PhpStorm.
 * User: Bidule
 * Date: 28/11/2017
 * Time: 09:03
 */

namespace src\managers;

use app\classes\Database;
use app\lib\QueryBuilder;
use src\models\User;
use PDO;


class UserManager extends Database
{
    private $data = [];

    /**
     * Connexion utilisateur
     * @param $email
     * @return array
     */
    public function login($email)
    {
        $db = new QueryBuilder($this->Connect());

        $select = [
            'id_user' => 'idUser',
            'username' => 'username',
            'password' => 'password',
            'email' => 'email',
            'role' => 'role',
        ];

        $req = $db->type('select')
                            ->select($select)
                            ->from('user')
                            ->where('email = :email');

        $req->bind(':email', $email);

        $data = $req->fetch();
        if($data == true) {
            $user[] = $this->buildUsers($data);
        }
            return $user;
    }


    /**
     * Disponibilité de l'email souhaité via BDD
     * @param $email
     * @return bool
     */
    public function checkUser($email)
    {
        $db = new QueryBuilder($this->Connect());

        $req = $db->type('select')
                            ->select('*')
                            ->from('user')
                            ->where('email = :email');
        $req->bind('email', $email);
        $result = $req->fetch();

        if($result === false)
        {
            return true;
        }
        return false;
    }

    /**
     * Ajout d'un utilisateur
     * @param User $user
     */
    public function inscription(User $user)
    {
        $db = new QueryBuilder($this->Connect());

        $req = $db->type('insert')
                            ->from('user')
                            ->insert('username, password, email, role')
                            ->values(':username, :password, :email, :role');
        $req->bind(':username', $user->username());
        $req->bind(':password', $user->password());
        $req->bind(':email', $user->email());
        $req->bind(':role', $user->role());

        $req->exec();
    }

    /**
     * Nombre total users pour admin
     * @return mixed
     */
    public function getMaxUsers()
    {
        $db = new QueryBuilder($this->Connect());

        $req = $db->type('select')
                            ->select('*')
                            ->from('user');

            $req->exec();

            return $req->rowCount();
    }

    /**
     * Retourne le dernier utilisateur enregistré
     * @return array
     */
    public function getLastUser()
    {
        $db = new QueryBuilder($this->Connect());

        $select = [
            'id_user' => 'idUser',
            'username' => 'username',
            'password' => 'password',
            'email' => 'email',
            'role' => 'role',
        ];

        $req = $db->type('select')
                            ->select($select)
                            ->from('user')
                            ->orderBy('id_user', 'DESC')
                            ->limit('0,1');

        $result = $req->fetchAll();

        foreach ($result as $data)
        {
            $user = $this->buildUsers($data);
            $this->data[] = $user;
        }
        return $this->data;
    }

    /**
     * Retourne la liste de tous les utilisateurs classés par rank
     * @return array
     */
    public function allUser()
    {
        $db = new QueryBuilder($this->Connect());

        $req = $db->type('select')
                            ->select('*')
                            ->from('user')
                            ->orderBy('role', 'ASC');

        $result = $req->fetchAll();

        foreach($result as $data)
        {
            $user = $this->buildUsers($data);
            $this->data[] = $user;
        }
        return $this->data;
    }


    /**
     * Retourne les libellés ranks / users
     * @return array
     */
    public function getRankUser()
    {
        $db = new QueryBuilder($this->Connect());

        $select = [
            'id_user' => 'idUser',
            'username' => 'username',
            'password' => 'password',
            'email' => 'email',
            'user.role' => 'idRole',
            'role.role' => 'libRole',
        ];

        $req = $db->type('select')
                            ->select($select)
                            ->from('user')
                            ->innerJoin('role')
                            ->where('user.role = role.id')
                            ->orderBy('role.ordre', 'ASC')
                            ->orderBy('user.username', 'ASC');

        $result = $req->fetchAll();
        $data = [];

        foreach ($result as $users)
        {
            $data[$users['idRole']][$users['idUser']] = $users;
        }
        return $data;
    }

    /**
     * Retourne les libellés des ranks
     * @return array
     */
    public function getRankName()
    {
        $db = new QueryBuilder($this->Connect());

        $req = $db->type('select')
                            ->select('id, role')
                            ->from('role')
                            ->orderBy('role', 'ASC');

        $data = [];
        foreach ($req->fetchAll() as $users)
        {
            $data[$users['id']] = $users['role'];
        }
        return $data;
    }

    /**
     * Mise à jour du role utilisateur
     * @param User $user
     */
    public function upRankUser(User $user)
    {
        $db = new QueryBuilder($this->Connect());

        $req = $db->type('update')
                            ->from('user')
                            ->set('role = :role')
                            ->where('id_user = :idUser');

        $req->bind(':role', $user->role());
        $req->bind(':idUser', $user->idUser());
        $req->exec();
    }

    /**
     * Suppression User
     * @param User $user
     */
    public function deluser(User $user)
    {
        $db = new QueryBuilder($this->Connect());

        $req = $db->type('delete')
                            ->from('user')
                            ->where('id_user = :idUser');

        $req->bind(':idUser', $user->idUser());
        $req->exec();
    }

    /**
     * Hydrate User
     * @param array $data
     * @return User
     */
    public function buildUsers(array $data)
    {
        $model = new User();

        $model->setIdUser($data['idUser']);
        $model->setUsername($data['username']);
        $model->setEmail($data['email']);
        $model->setPassword($data['password']);
        $model->setRole($data['role']);

        return $model;
    }
}