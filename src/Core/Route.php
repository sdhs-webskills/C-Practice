<?php
namespace src\Core;

class Route {
  static $GET = [];
  static $POST = [];
  public static function init() {
    $get = isset($_GET['url']) ? "/".$_GET['url'] : "/";
    // echo $get;
    foreach (self::${$_SERVER['REQUEST_METHOD']} as $v) {
      $v = explode("@", $v);

      if($v[0] == $get) {
        // echo "Route";
        $src = "src\\Controller\\".$v[1];
        $src = new $src();
        $src->{$v[2]}();
        exit;
      }
    }
    move("/","이 주소로 접속할 수 없습니다.");
  }
  public static function reg($arr) {
    foreach ($arr as $v) {
      self::${strtoupper($v[0])}[] = $v[1];
    }
  }
}