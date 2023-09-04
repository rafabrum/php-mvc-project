<?php

use App\Core\Router\Router;

Router::get('/','HomeController@index');
Router::post('/store', 'HomeController@store');
Router::get('/{$nis}', 'HomeController@filter');
