<?php 

$router->group([
    'middleware' => 'auth',
    'prefix' => 'api'
], function () use ($router) {

    
    $router->post('refresh', 'AuthController@refresh');
    $router->post('logout', 'AuthController@logout');
    //$router->post('me', 'AuthController@me');

});

$router->group([

    //'middleware' => 'auth',
    'prefix' => 'api'

], function () use ($router) {

    $router->post('me', 'AuthController@me');
    $router->post('login', 'AuthController@login');
    $router->post('register', 'AuthController@registerInApp');
    $router->post('registerExternal', 'AuthController@registerExternal');
});