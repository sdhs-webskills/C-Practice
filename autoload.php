<?php
function myLoader($name)
{
    $prefix = "Core\\";
    $base_dir = __ROOT . __DS . "src" . __DS;
    $prefixLen = strlen($prefix);

    if(strncmp($prefix, $name, $prefixLen) == 0){
        $realName = substr($name, $prefixLen);
        $realName = str_replace("\\", "/", $realName);
        $file = "{$base_dir}{$realName}.php";
        if (file_exists($file)){
            require_once($file);
        }
    }    
}

spl_autoload_register("myLoader");