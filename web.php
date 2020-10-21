<?php
use src\Core\Route;

// Route::reg([
//   ["get","/main@MainController@page/main"],
// ]);

if(ss()) {
  Route::reg([
    ["get","/@MainController@main"],
    ["get","/logout@User@logout"],
    ["get","/userSearch@Friend@userSearch"],
    ["get","/profile@User@profile"],
    ["post","/requestFriend@Friend@requestFriend"],
    ["get","/friendRequest@Friend@friendRequest"],
    ["post","/requestAcceptance@Friend@requestAcceptance"],
    ["post","/requestRefuse@Friend@requestRefuse"],
    ["get","/addBulletin@Bulletin@addBulletin"],
    ["post","/sendBulletin@Bulletin@sendBulletin"],
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