<?php

namespace src\controllers;

use framework\core\Controller;

class IndexController extends Controller
{
    //public $layout = 'test';

    public function index()
    {
        $name = "HUESOS";
        $age = '30 old';
        $this->set(compact('name', 'age'));
    }
}