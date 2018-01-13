<?php
/**
 * Created by PhpStorm.
 * User: Bidule
 * Date: 24/11/2017
 * Time: 15:11
 */

namespace app\lib;
use app\classes\Database;
use \PDO;

class QueryBuilder extends Database
{
    private $pdo;
    private $select = [];
    private $insert = [];
    private $from = [];
    private $andFrom = [];
    private $where = [];
    private $and = [];
    private $values = [];
    private $limit = [];
    private $orderBy = [];
    private $set = [];
    private $type = [];
    private $bind = [];
    private $join = [];

    /**
     * Créé une instance de PDO
     * QueryBuilder constructor.
     * @param PDO|null $pdo
     */
    public function __construct(PDO $pdo = null)
    {
        $this->pdo = $pdo;
    }

    /**
     * Select requete
     * @param $fields
     * @return $this
     */
    public function select($fields)
    {
        $alias = array();
        if(is_array($fields))
        {
            foreach($fields as $key => $val)
            {
                $alias[] = $key . ' AS ' . $val;
            }
                $this->select[] =  implode(', ', $alias);
        }
        else {
        $this->select[] = $fields;
        }

        return $this;
    }

    /**
     * INSERT PDO
     * @param $fields
     * @return $this
     */
    public function insert($fields)
    {
        $this->insert[] = $fields;
        return $this;
    }

    /**
     * FROM PDO
     * @param $table
     * @return $this
     */

    public function from($table)
    {
        if(is_array($table))
        {
            foreach($table as $key => $val)
            {
                $alias = array($key. ' AS '. $val. ', ');
                $this->from[] = implode(' ', $alias);
            }
        }
        else
        {
            $this->from[] = $table;
        }
        return $this;
    }

    /**
     * si 2 from utilisés (entre autre sur le INNER JOIN remplace le ON
     * @param $args
     * @return $this
     */
    public function andFrom($args)
    {
        $this->andFrom[] = $args;
        return $this;
    }


    /**
     * Where avec conditions si besoin
     * @param array ...$args
     * @return $this
     */
    public function where($args)
    {
        $this->where[] = $args;
        return $this;
    }

    /**
     * Si plus d'une clause WHERE
     * @param $args
     * @return $this
     */
    public function andWhere($args)
    {
        $this->and[] = $args;
        return $this;
    }


    /**
     * Jointure de requete
     * @param $table
     * @return $this
     */
    public function innerJoin($table)
    {
        $this->join[] = $table;
        return $this;
    }


    /**
     * Values for insert request
     * @param $values
     * @return $this
     */
    public function values($values)
    {
        $this->values[] = $values;

        return $this;
    }


    /**
     * set for update
     * @param $values
     * @return $this
     */
    public function set($values)
    {
        $this->set[] = $values;

        return $this;
    }


    /**
     * Limit on select
     * @param $offset
     * @return $this
     */
    public function limit($offset)
    {
        $this->limit[] = $offset;
        return $this;
    }


    /**
     * order by for select request
     * @param $fields
     * @param $order
     * @return $this
     */
    public function orderBy($fields, $order)
    {
        $this->orderBy[] = $fields.' '.$order;
        return $this;
    }


    /**
     * Définit le type de requête à faire ==> select, update, delete ou insert
     * @param $type
     * @return $this
     */
    public function type($type)
    {
        $this->type[] = $type;
        return $this;
    }


    /**
     * fetchAll PDO
     * @return mixed
     */
    public function fetchAll()
    {
        $req = $this->buildQuery();
        $res = $this->execute($req);
        $res->setFetchMode(PDO::FETCH_ASSOC);

        return $res->fetchAll();
    }

    /**
     * Fetch PDO
     * @return mixed
     */
    public function fetch()
    {
        $req = $this->buildQuery();
        $res = $this->execute($req);
        $res->setFetchMode(PDO::FETCH_ASSOC);

        return $res->fetch();
    }

    /**
     * Execute PDO dans le cas d'un fetchAll
     * @param $query
     * @return \PDOStatement
     */
    public function execute($query)
    {
        $db = $this->pdo;
        $req = $db->prepare($query);
        $req->execute($this->bind);
        return $req;
    }


    /**
     * Execute PDO dans le cas d'un Fetch
     * @return \PDOStatement
     */
    public function exec()
    {
        $req = $this->buildQuery();
        $res = $this->execute($req);

        return $res;
    }


    /**
     * Query PDO
     * @param $statement
     * @return mixed
     */
    public function query($statement)
    {
        $req = $this->pdo->query($statement);
        return $req->fetch($req);
    }

    /**
     * Bind PDO
     * @param $param
     * @param $key
     */
    public function bind($param, $key)
    {
        $this->bind[$param] = $key;
    }


    /**
     * rowCount PDO
     * @return mixed
     */
    public function rowCount()
    {
        $req = $this->buildQuery();
        if(!empty($this->bind))
        {
            $res = $this->execute($this->bind);
        }
        else {
        $res = $this->exec($req);
        }
        return $res->rowCount();
    }


    /**
     * Close Cursor PDO
     */
    public function close()
    {
        $db = $this->pdo;
        return $db->closeCursor();
    }


    /**
     * Constructeur de la requête PDO sous une chaîne de caractères
     * selon toutes les conditions possibles
     * @return string
     */
    public function buildQuery()
    {
//        $statement = implode(' ', $this->statement);
        $type = implode(' ', $this->type);
        $req = strtoupper($type.' ');

        if($type == 'select')
        {
            if(is_array($this->select))
            {
                $req .=  implode(' ', $this->select);
                $req .= ' FROM ' . implode(' ', $this->from);
                if(!empty($this->andFrom))
                {
                    foreach ($this->andFrom as $result)
                    {
                        $req .= ' , ' .$result;
                    }
                }

                if(!empty($this->join))
                {
                    $req.= ' INNER JOIN '.implode(' ', $this->join);
                }
                if(!empty($this->where))
                {
                    $req .= ' WHERE ' .implode(' ', $this->where);
                }
                if(!empty($this->and))
                {
                    foreach ($this->and as $result)
                    {
                    $req .= ' AND ' .$result;
                    }
                }
                if(!empty($this->orderBy))
                {
                    $req .= ' ORDER BY ' .implode(', ', $this->orderBy);
                }
                if(!empty($this->limit))
                {
                    $req .= ' LIMIT ' .implode(', ', $this->limit);
                }
            }
        }
        elseif ($type == 'insert')
        {
            $req .= ' INTO ' . implode(' ', $this->from);
            $req .= '  ( ' . implode(' ', $this->insert). ') ';
            $req .= 'VALUES ('. implode(' ', $this->values) . ')';
        }
        elseif ($type == 'delete')
        {
            $req .= ' FROM ' . implode(' ', $this->from);
            $req .= ' WHERE ' .implode(' ', $this->where);
        }
        elseif ($type == 'update')
        {
            $req .= implode(' ', $this->from);
            if(!empty($this->andFrom)) {
                foreach ($this->andFrom as $result) {
                    $req .= ' , ' . $result;
                }
            }
            $req .= ' SET '.implode(' ', $this->set);
            $req.= ' '.implode(' ', $this->values).'';
            $req .= ' WHERE ' .implode(' ', $this->where);
        }
        else {
            return "Remplir un type de requete (insert, delete, select ou update)";
        }
        return $req;
    }
}