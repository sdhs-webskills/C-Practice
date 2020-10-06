<?php
    namespace Core\App;

    class Library
    {
        public static function msgAndGo($msg, $target, $css = "danger")
        {
            $_SESSION['err'] = ['css'=>$css, 'msg'=>$msg];
            header("Location: " . $target);
        }
    }
?>