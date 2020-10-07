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
        return $query->execute($data);
    }

    public static function fetch($sql, $data = [])
    {
        return self::execute($sql, $data)->fetch(\PDO::FETCH_OBJ);
    }

    public static function fetchAll($sql, $data = [])
    {
        return self::execute($sql, $data)->fetchAll(\PDO::FETCH_OBJ);
    }
    public static function lastId()
    {
        return self::getDB()->lastInsertId();
    }
}