<?php
namespace src\Controller;
use src\Core\DB;

class User
{
  public function login()
  {
    view("login", []);
  }

  public function join()
  {
    view("join", []);
  }

  function loginAction()
  {
    $user = DB::fetch("SELECT * FROM users WHERE email = ? AND pass = ?", [$_POST["id"], $_POST["pass"]]);

    if ($user) {
      $_SESSION["user"] = $user;
      // print_r($user);
      move("/", "로그인 되었습니다.");
    } else {
      back("아이디 또는 비밀번호가 일치하지 않습니다.");
    }
  }

  function logout()
  {
    unset($_SESSION["user"]);
    move("/", "로그아웃 되었습니다.");
  }

  function joinAction()
  {
//    print_r($_FILES["profile"]);
    $imageType = explode("/", $_FILES["profile"]["type"]);
    if ($imageType[0] !== "image") {
      return back("이미지 파일만 업로드 가능합니다.");
    }

    $imageType = end(explode(".", $_FILES["profile"]["name"]));

    if ($imageType !== "jpg" && $imageType !== "png" && $imageType !== "gif") {
      // return print_r($imageType);
      return back("이미지 파일은 jpg, png, gif 파일만 업로드 가능합니다.");
    }



    $imgName = $_POST["id"] . time() . "." . $imageType;
//		echo $imgName;
    $sql = "INSERT INTO `users`(`email`, `pass`, `name`, `birth`, `image`) VALUES (?,?,?,?,?)";
    DB::query($sql, [$_POST["id"], $_POST["pass"], $_POST["name"], $_POST["birth"], $imgName]);
    move_uploaded_file($_FILES["profile"]["tmp_name"], "./public/images/user_profile/" . $imgName);
    move("/", "회원가입이 완료되었습니다.");
  }

  function emailCheck()
  {
    $id = $_POST['id'];
    $response = ["success" => true];
    if (DB::fetch("SELECT * FROM users WHERE email = ?", [$id])) {
      $response['success'] = false;
    }
    echo json_encode($response);
  }


}

