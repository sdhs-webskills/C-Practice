<?php

include_once("src/core/DB.php");
use src\core\DB;

class UserController{

    public static function getLogin() {
        return view("src/view/user/account/login.php", []);
    }

    public static function postLogin() {
        $email = $_POST["email"];
        $password = $_POST["password"];

        $id_check = false;
        $pw_check = false;

        $result = DB::fetch("select * from person where Email='$email' and Password=password('$password');", []);

        if($result) {
            session_start();

            $_SESSION["email"] = $email;
            $_SESSION["login-whether"] = true;

            header('Location: /webskills/main.php');
        }else{
            $result = DB::fetch("select * from person where Email='$email';", []);

            session_start();

            $_SESSION["email"] = "";
            $_SESSION["login-whether"] = false;

            if($result) {
                alert("비밀번호를 확인해주세요.");

                echo "<script>document.location.href='/webskills/src/page/login.html';</script>";
            }else {
                alert("존재하지않는 아이디입니다.");

                echo "<script>document.location.href='/webskills/src/page/login.html';</script>";
            };
        };
    }

    public static function getRegister() {
        return view("src/view/user/account/register.php", []);
    }

    public static function postRegister() {
        $email = $_POST["email"];
        $password = $_POST["password"];
        $name = $_POST["name"];
        $birthday = $_POST["birthday"];
        $img = $_FILES["img"]["name"];

        register($email, $password, $name, $birthday, $img);

        function register($email, $password, $name, $birthday, $img) {
            $img_path = "../account/image/user/profile";

            $imgs = $_FILES["img"]["name"];
            if($imgs) {

                $imgs = explode(".", $imgs);
                $img_nm = cut_email($email)."_profile_img.".$imgs[1];

                $sql_path = "../account/image/user/";
                $sql_img_path = $sql_path.$img_nm;

                DB::fetch("insert into person values('$email', password('$password'), '$name', '$birthday', '$sql_img_path', now());", []);

                move_uploaded_file($_FILES["img"]["tmp_name"], $img_path.$img_nm);
            }else {
                DB::fetch("insert into person(Email, Password, Name, Birth, Time) values('$email', password('$password'), '$name', '$birthday', now());", []);
            };

            alert("회원가입 완료되었습니다");

            echo "<script>document.location.href='/webskills/src/page/login.html';</script>";
        };

        function cut_email($email) {
            $reg = '/@/';
            preg_match($reg, $email,  $match, PREG_OFFSET_CAPTURE);

            $result = substr($email, 0, $match[0][1]);

            return $result;
        };
    }

    public static function logout() {
        return view("src/view/user/account/logout.php", []);
    }
};