<?php 

$router->group([

    //'middleware' => 'api',
    'prefix' => 'api'

], function () use ($router) {

    $router->post('login', 'AuthController@login');
    $router->post('logout', 'AuthController@logout');
    $router->post('register', 'AuthController@registerInApp');
    $router->post('registerExternal', 'AuthController@registerExternal');
    $router->post('refresh', 'AuthController@refresh');
    //$router->post('me', 'AuthController@me');

});

$router->group([

    //'middleware' => 'auth',
    'prefix' => 'api'

], function () use ($router) {

    $router->get('me', 'AuthController@me');

});