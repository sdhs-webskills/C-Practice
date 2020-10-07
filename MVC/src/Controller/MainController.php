<?php

namespace Core\Controller;

use Core\App\View;

class MainController extends MasterController
{
    public function index()
    {
        $datas = ['msg'=>'Hello World'];
        $this->render("main",$datas);
    }
}