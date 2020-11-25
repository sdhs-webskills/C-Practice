<?php

function view($view, $variables = []) {
    foreach($variables as $variable => $value) {
		$$variable = $value;
    };

    include $view;
};

function alert($text) {
    echo "<script>alert('{$text}');</script>";
};