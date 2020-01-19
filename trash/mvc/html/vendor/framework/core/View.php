<?php


namespace framework\core;


class View
{
    public $route;
    public $controller;
    public $view;
    public $model;
    public $prefix;
    public $layout;
    public $data = [];
    public $meta = [];

    public function __construct($route, $meta, $layout = '', $view = '')
    {
        $this->route = $route;
        $this->controller = $route['controller'];
        $this->model = $route['controller'];
        $this->view = $view;
        $this->prefix = $route['prefix'];
        $this->meta = $meta;
        if($layout === false){
            $this->layout = false;
        }else{
            $this->layout = $layout ?: LAYOUT;
        }
    }

    public function render($data)
    {
        if(is_array($data)) extract($data);
        $viewFile = ROOT . "/templates/views/{$this->prefix}{$this->controller}/{$this->view}".'.php';
        if(is_file($viewFile)){
            ob_start();
            require_once $viewFile;
            $content = ob_get_clean();
        }else{
            throw new \Exception("View $viewFile not found", 500);
        }
        if(false !== $this->layout){
            $layoutFile = ROOT . "/templates/layouts/{$this->layout}.php";
            if(is_file($layoutFile)){
                require_once $layoutFile;
            }else{
                throw new \Exception("Layout {$layoutFile} not found");
            }
        }
    }
}