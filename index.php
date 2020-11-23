<?php

session_start();

include_once("src/core/Route.php");
include_once("src/core/DB.php");
include_once("src/Controller/MainController.php");
include_once("lib.php");

use src\core\Route;

Route::add("GET", "/webskills/", "MainController::goToMain");
Route::add("GET", "/webskills/main", "MainController::main");
Route::add("GET", "/user/login", "UserController::login");

Route::run();

?>