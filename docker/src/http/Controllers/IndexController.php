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
    $data = ['data' => $test->get("SELECT * FROM tests")];

    // Send Response
    $this->response->sendStatus(200);
    $this->response->setContent($data);
  }
}
