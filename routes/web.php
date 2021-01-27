<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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



$router->group([

    //'middleware' => 'auth',
    'prefix' => 'api'

], function () use ($router) {

    $router->post('login', 'AuthController@login');
    $router->post('logout', 'AuthController@logout');
    $router->post('register', 'AuthController@registerInApp');
    $router->post('register', 'AuthController@registerExternal');
    $router->post('refresh', 'AuthController@refresh');
    

});

$router->group([

    //'middleware' => 'auth',
    'prefix' => 'api'

], function () use ($router) {

    $router->get('me', 'AuthController@me');

});