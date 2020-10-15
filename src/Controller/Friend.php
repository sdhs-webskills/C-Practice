<?php
namespace src\Controller;
use src\Core\DB;

class Friend
{
  public function userSearch() {
    if(isset($_GET["search"])) {
      $q = $_GET["search"];
      $likeQ = "%{$q}%";
      $searchedUser = DB::fetchAll("SELECT * FROM users WHERE name LIKE ? OR email LIKE ?",[
        $likeQ,
        $likeQ
      ]);
      $friends = DB::fetchAll("SELECT `friend` FROM friend WHERE user = ?", [$_SESSION['user']->idx]);
      view("userSearch", ["searchedUser" => $searchedUser, "friends" => $friends]);
      return;
    }
    view("userSearch", []);
  }

  public function requestFriend() {
    $userIdx = $_SESSION["user"]->idx;
    if($userIdx == $_POST["key"]) {
      back("친구요청을 할 수 없는 대상입니다.");
      return;
    }
    if($_POST["whether"] == 1) {
      DB::query("DELETE FROM friend WHERE user = ? AND friend = ?", [$_POST["key"], $userIdx]);
      DB::query("DELETE FROM friend WHERE user = ? AND friend = ?", [$userIdx, $_POST["key"]]);
      back("친구를 끊었습니다.");
      return;
    }else if($_POST["whether"] == 0) {
      // print_r([$userIdx, $_POST["key"]]);
      $whether = DB::fetch("SELECT * FROM `friend_request` WHERE `from` = ? AND `to` = ?",[$userIdx, $_POST["key"]]);
      // $whether = DB::fetch("SELECT `friend` FROM friend WHERE user = ?", [$_SESSION['user']->idx]);
      // print_r($whether);
      if($whether) {
        back("이미 친구요청을 보낸 상태입니다.");
        return;
      }else {
        DB::query("INSERT INTO `friend_request`(`from`, `to`) VALUES (?, ?)", [$userIdx, $_POST["key"]]);
      }
    }
    back("친구요청을 보냈습니다.");
  }

  public function friendRequest() {
    $requestIdxList = DB::fetchAll("SELECT `from` FROM `friend_request` WHERE `to` = ?", [$_SESSION["user"]->idx]);
    $requestList = array();
    foreach($requestIdxList as $list) {
      $idx = $list->from;
      array_push($requestList, DB::fetch("SELECT * FROM `users` WHERE `idx` = ?",[$idx]));
    }
    view("friendRequest",["requestList" => $requestList]);
  }

  public function requestAcceptance() {
    $userIdx = $_SESSION["user"]->idx;
    DB::query("DELETE FROM friend_request WHERE `from` = ? AND `to` = ?", [$userIdx, $_POST["key"]]);
    DB::query("DELETE FROM friend_request WHERE `from` = ? AND `to` = ?", [$_POST["key"], $userIdx]);
    DB::query("INSERT INTO `friend`(`user`, `friend`) VALUES (?, ?)", [$userIdx, $_POST["key"]]);
    DB::query("INSERT INTO `friend`(`user`, `friend`) VALUES (?, ?)", [$_POST["key"], $userIdx]);
    // back("친구요청을 수락하였습니다.");
  }

  public function requestRefuse() {
    back("친구요청을 거절하였습니다.");
  }
}