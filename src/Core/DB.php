<?php
namespace src\Core;


class DB {
  static $db;
  
  public function getDB() {
    if(is_null(self::$db))
    self::$db =new \PDO("mysql:host=localhost; dbname=php_skills; charset=utf8mb4;", "root", "");
    
    return self::$db;
  }
  
  public function query($sql, $d) {
    $row = self::getDB()->prepare($sql);
    try{
      $row->execute($d);
    }catch(\Exception $e) {
      echo $e->getMessage();
    }
  }
  
  public static function fetch($sql, $d) {
    $row = self::getDB()->prepare($sql);
    $row->execute($d);
    
    return $row->fetch(\PDO::FETCH_OBJ);
  }
  
  public static function fetchAll($sql, $d) {
    $row = self::getDB()->prepare($sql);
    $row->execute($d);
    
    return $row->fetchAll(\PDO::FETCH_OBJ);
  }
}