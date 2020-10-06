<?php

namespace Core\Controller;

use Core\App\DB;
use Core\App\Library;

class UserController extends MasterController
{
    public function register()
    {
        $this->render("User/join");
    }

    public function registerProcess()
    {
        $userid = $_POST["userid"];
        $pass = $_POST["password"];
        $passchk =$_POST["passwordchk"];
        $username = $_POST["username"];

        if($userid == "" || $pass == "" || $username = ""){
            Library::msgAndGo("입력하지 않은곳이 있습니다.", "../User/join");
            return;
        }
        if($pass != $passchk){
            Library::msgAndGo("비밀번호가 일치하지 않습니다.", "/User/join");
            return;
        }
        $sql = "INSERT INTO users(`id`, `name`, `password`, `level`) VALUES (?, ?, PASSWORD(?), ?)";

        $result = DB::execute($sql, [$userid, $username, $pass, 1]);

        if($result != 1){
            Library::msgAndGo("올바른 값이 안들어갔습니다.", "../User/join");
            return;
            }
            Library::msgAndGo("회원가입이 완료됨. 로그인 바람.", "../User/login", "success");
            return;
        }
    }

    public function loginprocess(){
        $userid = $_POST["userid"];
        $pass = $_POST["password"];
        $sql = "SELECT * FROM users WHERE id = ? AND password = PASSWORD(?)";
        $user = DB::fetch($sql, [$userid, $pass]);

        if($user == null){
            Library::msgAndGo("비밀번호가 달라!", "../User/login");
            return;
        }
        $_SESSION["user"] = $user;
        Library::msgAndGo("로그인 되었다!", "/", "success");
        return;
    }
    public function logout()
    {
        unset($_SESSION["user"]);
        Library::msgAndGo("로그아웃 되었습니다.", "/", "success");
        return;
    }
}