<?php

session_start();

include_once("lib.php");
include_once("src/core/DB.php");
include_once("src/core/Route.php");
include_once("src/Controller/MainController.php");
include_once("src/Controller/UserController.php");

use src\core\Route;

function test () {
    echo "test";
};

function test2 () {
    echo "test2";
};


function test3 () {
    echo "test3";
};

Route::add("GET", "/", "test");
Route::add("GET", "/test", "test");
Route::add("GET", "/test2", "test");
Route::add("GET", "/test3/([0-9]+)", "test3");
//Route::add("GET", "/webskills/", "MainController::goToMain");
//Route::add("GET", "/webskills/main", "MainController::main");
//Route::add("GET", "/webskills/src/user/account/login", "UserController::getLogin");
//Route::add("GET", "/webskills/src/user/account/register", "UserController::getRegister");
//
//Route::add("POST", "/webskills/src/user/account/login", "UserController::postLogin");
//Route::add("POST", "/webskills/src/user/account/register", "UserController::postRegister");

Route::run();