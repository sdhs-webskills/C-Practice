<?php

use Core\App\Route;

Route::get('/', 'MainController@index');

if(isset($_SESSION["user"])) {
    Route::get('/User/logout', 'UserController@logout');
}else{
Route::post('/User/join', 'UserController@registerProcess');
Route::post('/User/login', 'UserController@loginprocess');
Route::get('/User/join', 'UserController@register');
Route::get('/User/login', 'UserController@login');
}
