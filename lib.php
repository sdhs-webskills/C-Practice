<?php

function view($view, $variables = []) {
    if(isset(current($variables)["params"][1])) {
        foreach(current($variables)["params"][1] as $variable => $value) {
            $param = $value;
        };
    };

    include $view;
};

function alert($text) {
    echo "<script>alert('{$text}');</script>";
};