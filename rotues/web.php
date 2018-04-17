<?php

$route->get('/',function(){
    return '路由OK';
});

$route->get('welcome','App\Http\Controllers\WelcomeController@index');