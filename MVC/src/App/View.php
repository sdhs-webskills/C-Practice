<?php

namespace Core\App;

class View 
{
    public function __construct($page, $data)
    {
        extract($data);
        require_once(__ROOT . __DS . "Views" . __DS . "layout" . __DS . "header.php");
        require_once(__ROOT . __DS . "Views" . __DS . $page . "footer.php");
    }
}