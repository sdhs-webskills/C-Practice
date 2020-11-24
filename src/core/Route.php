<?php

namespace src\core;

class Route{
    private static array $routes = [];

	public static function add($method, $uri, $callback) {
        $uriReg = str_replace("/", "\/", $route['uri'] ?? '/');
		self::$routes[] = compact("method", "uriReg", "callback");
	}

	public static function run() {
	    $route = current(array_filter(self::$routes, fn($route) => self::match($route)));
        preg_match_all();
		return call_user_func($route["callback"], ...$params);
	}

	private static function match($route) {
	    $uri = str_replace("/", "\/", $route['uri'] ?? '/');
		return $route['method'] === $_SERVER["REQUEST_METHOD"] &&
               preg_match("/^{$uri}$/", $_SERVER["REQUEST_URI"]);
	}

}