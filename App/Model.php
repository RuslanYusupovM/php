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

    public static function updateLastName($text, $id)
    {
        $db = new Db();
        $query = 'UPDATE ' . static::$table . ' SET lastname=:text WHERE id=:id';
        return $db->execute($query, ['text' => $text, 'id' => $id]);
    }

    public static function insert($id, $column1, $column2)
    {
        $db = new Db();
        $query = 'INSERT INTO ' . static::$table . ' VALUES (:id, :column1, :column2)';
        echo $query;
        return $db->execute($query, ['id' => $id, 'column1' => $column1, 'column2' => $column2]);
    }

    public static function findById($id)
    {
        $db = new Db();
        $sql = 'SELECT * FROM ' . static::$table . ' WHERE id=:id';
        $record = $db->query($sql, ['id' => $id], static::class);
        $res = !empty($record) ? $record : 'false';
        return $res;
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