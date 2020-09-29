<?php

namespace src\core;

class DB{
	static $db;

	public function getDB() {
		self::$db = new \PDO("mysql:host=localhost;port=3306;dbname=people;charset=utf8mb4", "root", "");

		return self::$db;
	}

	public static function fetch($sql, $arr) {
		$stmt = self::getDB() -> prepare($sql);
		$stmt -> execute($arr);
		$result = $stmt;

		return $result -> fetch();
	}

	public static function fetchAll($sql, $arr) {
		$stmt = self::getDB() -> prepare($sql);
		$stmt -> execute($arr);
		$result = $stmt;

		return $result -> fetchAll();
	}
};

?>