<?php

class MainController{
    public static function goToMain() {
        header("Location: /webskills/main");
    }

	public static function main() {
		return view("main.php", []);	
	}
};

?>