<?php
    session_start();

    define("HOME", __dir__);

    include_once("./core/lib.php");
    include_once("./core/common.php");


    include_once("./view/template/header.php");
    if (isset($include_file)) {
        include_once("./view/{$page}/{$include_file}.php");
    } else {
        include_once("./view/template/main.php");
    }
    include_once("./view/template/footer.php");