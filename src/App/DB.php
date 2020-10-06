<?php

namespace Core\App;

class DB
{
    private static $db = null;
    
    private static function getDB()
    {
        if(is_null(self::$db)){
            self::$db = new \PDO("mysql:host=localhost; dbname=member; charset=utf8mb4;", "root", "");
        }
        return self::$db;
    }

    public static function execute($sql, $data = [])
    {
        $query = self::getDB()->prepare($sql);
        $query->execute($data);
        return $query->fetch($mode);
    }

    public static function fetchAll($sql, $data = [], $mode = \PDO::FETCH_OBJ)
    {
        $query = self::getDB()->prepare($sql);
        $query->execute($data);
        return $query->fetchAll($mode);
    }
    public static function lastId()
    {
        return self::getDB()->lastInsertId();
    }
}