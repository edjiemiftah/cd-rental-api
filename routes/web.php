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
$router->get('/stocks', 'StockController@index');
$router->post('/stocks', 'StockController@store');
$router->get('/stocks/{id}', 'StockController@show');
$router->put('/stocks/{id}', 'StockController@update');

$router->post('/rent', 'OrderController@new');
$router->post('/rent/return', 'OrderController@complete');