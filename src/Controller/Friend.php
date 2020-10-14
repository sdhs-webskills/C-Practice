<?php
namespace src\Controller;
use src\Core\DB;

class Friend
{
  public function userSearch() {
    $q = $_GET["search"];
    $likeQ = "%{$q}%";
    $searchedUser = DB::fetchAll("SELECT * FROM users WHERE name LIKE ? OR email LIKE ?",[
      $likeQ,
      $likeQ
    ]);
    $friends = DB::fetchAll("SELECT `friend` FROM friend WHERE user = ?", [$_SESSION['user']->idx]);
    view("userSearch", ["searchedUser" => $searchedUser, "friends" => $friends]);
  }

  public function requestFriend() {
    $userIdx = $_SESSION["user"]->idx;
    if($_POST["whether"] == 1) {
      DB::query("DELETE FROM friend WHERE user = ? AND friend = ?", [$_POST["key"], $userIdx]);
      DB::query("DELETE FROM friend WHERE user = ? AND friend = ?", [$userIdx, $_POST["key"]]);
    }else if($_POST["whether"] == 0) {
      print_r([$userIdx, $_POST["key"]]);
      $whether = DB::fetch("SELECT * FROM friend_request WHERE from = ? AND to = ?",[$userIdx, $_POST["key"]]);
      // $whether = DB::fetch("SELECT `friend` FROM friend WHERE user = ?", [$_SESSION['user']->idx]);
      print_r($whether);
      // if($whether) {
      //   back("이미 친구요청을 보낸 상태입니다.");
      // }else {
      //   DB::query("INSERT INTO `friend_request`(`from`, `to`) VALUES (?, ?)", [$userIdx, $_POST["key"]]);
      // }
    }
    // back();
  }
}