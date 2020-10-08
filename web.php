<?php
use src\Core\Route;

// Route::reg([
//   ["get","/main@MainController@page/main"],
// ]);

if(ss()) {
  Route::reg([
    ["get","/@MainController@main"],
    ["get","/logout@User@logout"],
    ["get","/userSearch@MainController@userSearch"],
  ]);
}else {
  Route::reg([
    ["get","/@User@login"],
    ["get","/join@User@join"],
    ["post","/login@User@loginAction"],
    ["post","/joinAction@User@joinAction"],
    ["post","/email-check@User@emailCheck"],
  ]);
}