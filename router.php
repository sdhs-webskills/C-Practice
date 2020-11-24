<?php
    // php built-in server로 실행시킬 때 사용하는 Router
    if (!preg_match("/^([^.]+)$/", $_SERVER['REQUEST_URI'])) {
        return false;
    }

    $_GET['url'] = $_SERVER['REQUEST_URI'];
    include_once("./index.php");
