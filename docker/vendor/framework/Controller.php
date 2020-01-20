<?php


namespace framework;


class Controller
{
  /**
   * Request Class.
   */
  public $request;

  /**
   * Response Class.
   */
  public $response;

  /**
   *  Construct
   */
  public function __construct() {
    $this->request = $GLOBALS['request'];
    $this->response = $GLOBALS['response'];
  }

  public function send($status = 200, $msg) {
    $this->response->setHeader(sprintf('HTTP/1.1 ' . $status . ' %s' , $this->response->getStatusCodeText($status)));
    $this->response->setContent($msg);
  }
}
