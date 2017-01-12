<?php

namespace App;

class Db
{

    protected $dbh;

    public function __construct()
    {
        $dsn = 'mysql:host=localhost;dbname=php2';
        $user = 'root';
        $password = '';
        $this->dbh = new \PDO($dsn, $user, $password);
    }

    public function query($sql, $data = [], $class = null)
    {
        $sth = $this->dbh->prepare($sql);
        $res = $sth->execute($data);
        if (false === $res) {
            die('DB error in ' . $sql);
        }
        if (null === $class) {
            return $sth->fetchAll();
        } else {
            return $sth->fetchAll(\PDO::FETCH_CLASS, $class);
        }
    }

    //2-й пункт дз
    public function execute($query, $params = [])
    {
        $sth = $this->dbh->prepare($query);
        $res = $sth->execute($params);
        return $res;
    }

}