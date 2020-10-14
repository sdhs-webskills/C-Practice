<?php
    session_start();

    define("HOME", __dir__);

    include_once(HOME . "/core/lib.php");
    include_once(HOME . "/core/common.php");


    include_once(HOME . "/view/template/header.php");
    if (isset($include_file)) {
        include_once(HOME . "/view/{$page}/{$include_file}.php");
    } else {
        include_once(HOME . "/view/template/main.php");
    }
    include_once(HOME . "/view/template/footer.php");