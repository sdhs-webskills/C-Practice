<?php

class MainController{
    public static function goToMain() {
        header("Location: /webskills/main");
    }

	public static function main($test) {
        if($test !== null) return view("main.php", [$test]);
        
		return view("main.php", []);	
	}
};