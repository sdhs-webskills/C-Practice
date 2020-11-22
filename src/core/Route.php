<?php

namespace src\core;

class Route{
	private static $routes = [];

	public static function add($method, $path, $callback) {
		self::$routes[] = compact("method", "path", "callback");
	}

	public static function run() {
		return call_user_func(
			current(
				array_filter(self::$routes, function($route) {return self::match($route["method"], $route["path"]);})
			)["callback"]
		);
	}

	private static function match($method, $path) {
		return $method === $_SERVER["REQUEST_METHOD"] && $path === $_SERVER["REQUEST_URI"] ?? "/";
	}
};

?>