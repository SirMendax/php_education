<?php


namespace framework\core;


class ExceptionHandler
{
    public function __construct()
    {
        if(DEBUG){
            error_reporting(-1);
        }else{
            error_reporting(0);
        }
        set_exception_handler([$this, 'exceptionHandler']);
    }

    public function exceptionHandler($error)
    {
        $this->log($error->getMessage(), $error->getFile(), $error->getLine());
        $this->show('Exception', $error->getMessage(), $error->getFile(), $error->getLine(), $error->getCode());
    }

    protected function log($message = '', $file = '', $line = '')
    {
        $message =
            "[" . date('Y-m-d H:i:s')
            . "] text error: {$message} | file error: {$file} | " .
            "line error: {$line} \n ==================================== \n";
        error_log($message, 3, ROOT . '/storage/logs/errors.log');
    }

    protected function show($errno, $errStr, $errFile, $errLine, $response = 404)
    {
        http_response_code($response);
        if($response === 404 && !DEBUG)
        {
            require ROOT . '/templates/errors/404.php';
            die;
        }
        if(DEBUG)
        {
            require ROOT . '/templates/errors/dev.php';
        }else{
            require ROOT . '/templates/errors/prod.php';
        }
    }
}