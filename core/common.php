<?php
    $param = isset($_GET['param']) ? explode("/", $_GET['param']) : [];
    $page = $param[0] ?? NULL;
    $action = $param[1] ?? NULL;
    $idx = $param[2] ?? NULL;
    $include_file = $action ?? $page;

    if (isset($_POST['action'])) {
        include_once(HOME . "/actions/{$page}.php");
        exit;
    }