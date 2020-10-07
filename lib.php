<?php
function auto($f) {
  require "$f.php";
}
spl_autoload_register("auto");

function script($s) {
  echo "<script>$s;</script>";
}

function alert($t) {
  script("alert('$t')");
}

function move($m, $t = "") {
  if(!empty($t))
    alert($t);
  script("location.replace('$m')");
}

function back($t = "") {
  if(!empty($t))
    alert($t);
  script("history.back()");
}

function view($f, $d) {
  extract($d);
  if(ss()){
    require "src/View/temp/header.php";
    require "src/View/page/$f.php";
    require "src/View/temp/footer.php";
  }else {
    require "src/View/page/$f.php";
  }
}

function ss() {
  return isset($_SESSION['user']) ? $_SESSION['user'] : false;
}