<?php

$router->get('/home', 'home@index');

$router->post('/upload', 'home@uploadImage');

$router->post('/home', 'home@post');

$router->get('/', function() {
    echo 'Welcome ';
});