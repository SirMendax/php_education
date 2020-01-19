<?php

use core\Controller;

class Home extends Controller
{

    public function index()
    {
        $data = [
            'user' => 'Mendax'
        ];
        $this->response->sendStatus(200);
        $this->response->setContent($data);
    }
}