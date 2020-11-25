<?php

namespace src\core;

class Route{
    private static array $routes = [];

    public static function add($method, $uri, $callback) {
        $uriReg = str_replace("/", "\/", $uri ?? '/');
        $uriReg = "/^{$uriReg}$/";
        self::$routes[] = compact("method", "uriReg", "callback");
    }

    public static function run() {
        $route = current(array_filter(self::$routes, fn($route) => self::match($route)));
        preg_match_all($route['uriReg'], $_SERVER['REQUEST_URI'], $params, 0);
        $request = ['params' => $params];
        return call_user_func($route["callback"], $request);
    }

    private static function match($route) {
        return $route['method'] === $_SERVER["REQUEST_METHOD"] &&
            preg_match($route['uriReg'], $_SERVER["REQUEST_URI"]);
    }
};