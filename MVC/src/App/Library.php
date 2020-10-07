<?php
    namespace Core\App;

    class Library
    {

        public static function alert($msg)
        {
            echo "<script>alert('{$msg}');</script>";
        }

        public static function move($url = false)
        {
            echo "<script>";
            echo $url ? "location.replace('{$url}');" : "history.back()";
            echo "</script>";
            exit;
        }

        public static function access($bool, $msg, $url = false)
        {
            if (!$bool) {
                self::alert($msg);
                self::move($url);
            }
        }

    }
?>