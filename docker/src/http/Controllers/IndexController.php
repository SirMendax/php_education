<?php

namespace src\http\Controllers;

use framework\Controller;
use src\Models\Test;

class IndexController extends Controller
{
  public function index()
  {
    // Prepare Data
    $test = new Test();
    $data = ['data' => $test->find(1)];

    // Send Response
    $this->response->sendStatus(200);
    $this->response->setContent($data);
  }
}
