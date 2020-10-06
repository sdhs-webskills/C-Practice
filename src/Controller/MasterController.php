<?php

namespace Core\Controller;

use Core\App\View;

class MasterController
{
    public function render($page, $datas = [])
    {
        $view = new View($page, $datas);
    }
}