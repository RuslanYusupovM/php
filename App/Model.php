<?php

namespace App;

abstract class Model
{

    public $id;

    public static function findAll()
    {
        $db = new Db();
        $sql = 'SELECT * FROM ' . static::$table;
        return $db->query($sql, [], static::class);
    }

    public static function countAll()
    {
        $db = new Db();
        $sql = 'SELECT COUNT(*) AS num FROM ' . static::$table;
        return (int)$db->query($sql, [], static::class)[0]->num;
    }

    public static function queryDB($query)
    {
        $db = new Db();
        return $db->execute($query);
    }

    public static function findById($id)
    {
        $db = new Db();
        $sql = 'SELECT * FROM ' . static::$table . ' WHERE id=:id';
        $record = $db->query($sql, ['id' => $id], static::class);
        $res = !empty($record) ? $record : 'false';
        return $res[0];
    }

    public static function findLimit($limit = false)
    {
        $db = new Db();
        if (false === $limit) {
            $sql = 'SELECT * FROM ' . static::$table;
        } else {
            $sql = 'SELECT * FROM ' . static::$table . ' ORDER BY id DESC LIMIT ' . (int)$limit;
        }
        return $db->query($sql, [], static::class);
    }

}