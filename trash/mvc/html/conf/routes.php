<?php

use framework\core\Router;


Router::add('^$', ["controller" => "Index", "action" => "index"]);
Router::add('^root$', ["prefix" => "root", "controller" => "Index", "action" => "index"]);

Router::add("^(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$");
Router::add("^(?P<prefix>[a-z-]+)/?(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$");