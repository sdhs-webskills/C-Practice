<?php

function view($view, $variables = []) {
    foreach(current($variables)["param"] as $variable => $value) {
		$param = $value;
    };

    include $view;
};

function alert($text) {
    echo "<script>alert('{$text}');</script>";
};