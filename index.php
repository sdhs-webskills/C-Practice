<?php

session_start();

include_once("lib.php");
include_once("src/core/DB.php");
include_once("src/core/Route.php");
include_once("src/Controller/MainController.php");
include_once("src/Controller/UserController.php");

use src\core\Route;

Route::add("GET", "/webskills/", "MainController::goToMain");
Route::add("GET", "/webskills/main", "MainController::main");
Route::add("GET", "/webskills/src/user/account/login", "UserController::getLogin");
Route::add("GET", "/webskills/src/user/account/register", "UserController::getRegister");

Route::add("POST", "/webskills/src/user/account/login", "UserController::postLogin");
Route::add("POST", "/webskills/src/user/account/register", "UserController::postRegister");

Route::run();