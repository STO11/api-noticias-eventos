<?php 


$router->group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function () use ($router) {

    $router->post('login', 'AuthController@login');
    $router->post('logout', 'AuthController@logout');
    $router->post('refresh', 'AuthController@refresh');
    $router->post('me', 'AuthController@me');

});