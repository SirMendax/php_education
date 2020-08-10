<?php

$router->get('/', 'IndexController@index');

// If you use SPACE in the url, it should convert the space to -, /home-index
$router->get('/catalog', 'CatalogController@index');

$router->post('/catalog', 'CatalogController@store');

$router->post('/entry', 'EntryController@store');
