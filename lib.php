<?php

function view($view, $variables = []) {
	foreach($variables as $variable => $value) {
		$$variable = $value;
	};

	include $view;
};

?>