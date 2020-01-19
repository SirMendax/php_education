<?php

namespace core\http;

class Request
{
    //переменная для хранения информации о запросе
    public $request;
    //переменная для хранения данных из куки
    public $cookie;
    //переменная для хранения файлов
    public $files;

    public function __construct() {
        $this->request = ($_REQUEST);
        $this->cookie = $this->clean($_COOKIE);
        $this->files = $this->clean($_FILES);
    }

    public function get($key = '') {
        if ($key != '')
            return isset($_GET[$key]) ? $this->clean($_GET[$key]) : null;

        return  $this->clean($_GET);
    }

    public function post($key = '') {
        if ($key != '')
            return isset($_POST[$key]) ? $this->clean($_POST[$key]) : null;

        return  $this->clean($_POST);
    }

    public function input($key = '') {
        $postData = file_get_contents("php://input");
        $request = json_decode($postData, true);

        if ($key != '') {
            return isset($request[$key]) ? $this->clean($request[$key]) : null;
        }

        return ($request);
    }

    public function server($key = '') {
        return isset($_SERVER[strtoupper($key)]) ? $this->clean($_SERVER[strtoupper($key)]) : $this->clean($_SERVER);
    }

    public function getMethod() {
        return strtoupper($this->server('REQUEST_METHOD'));
    }

    public function getClientIp() {
        return $this->server('REMOTE_ADDR');
    }

    public function getUrl() {
        return $this->server('REQUEST_URI');
    }
    protected function clean($data) {
        if (is_array($data)) {
            foreach ($data as $key => $value) {

                // Delete key
                unset($data[$key]);

                // Set new clean key
                $data[$this->clean($key)] = $this->clean($value);
            }
        } else {
            $data = htmlspecialchars($data, ENT_COMPAT, 'UTF-8');
        }

        return $data;
    }

}