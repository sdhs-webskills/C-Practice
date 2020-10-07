<?php

namespace Core\App;

class Route {
    private static $actions = [];

    public static function __callStatic($method, $args)
    {
        $req = strtolower($_SERVER['REQUEST_METHOD']);

        if($req == $method){
            self::$actions[] = $args;
        }
    }

    public static function init()
    {
        $path = explode('?', $_SERVER['REQUEST_URI']);
        $path = $path[0];

        foreach(self::$actions as $request){
                if($request[0] === $path){
                    $action = explode('@', $request[1]);
                    $controller = 'Core\\Controller\\' .$action[0];
                    $controller = new $controller();
                    $controller->{$action[1]}();
                    return;
                }
            }
            echo "잘못된 접근!";
    }
}