<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

// swagger demo
$router->group(['prefix' => 'sw'], function () use ($router) {
    $router->post('/demo', 'ExampleController@demo');
});


// lumen 功能 demo
$router->group(['prefix' => 'demo'], function () use ($router) {
    $router->get('/index', 'DemoController@index');
    $router->get('/ev', 'DemoController@eventDemo');
    $router->get('/jo', 'DemoController@jobDemo');
});

