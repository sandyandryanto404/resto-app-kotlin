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

$router->group(['prefix' => 'api'], function () use ($router) {
    $router->group(['prefix' => 'auth'], function () use ($router) {
        $router->post('login', ['uses' => 'AuthController@login']);
        $router->post('logout', ['uses' => 'AuthController@logout']);
        $router->post('refresh', ['uses' => 'AuthController@refresh']);
        $router->post('register', ['uses' => 'AuthController@register']);
        $router->get('confirm/{token}', ['uses' => 'AuthController@confirm']);
        $router->post('resend', ['uses' => 'AuthController@resend']);
        $router->post('email/forgot', ['uses' => 'AuthController@forgot']);
        $router->post('email/reset/{token}', ['uses' => 'AuthController@reset']);
    });
    $router->group(['prefix' => 'account'], function () use ($router) {
        $router->get('profile/me', ['uses' => 'AccountController@me']);
        $router->post('profile/update', ['uses' => 'AccountController@profile']);
        $router->post('profile/password', ['uses' => 'AccountController@password']);
    });
    $router->group(['prefix' => 'category'], function () use ($router) {
        $router->get('list', ['uses' => 'CategoryController@list']);
        $router->post('create', ['uses' => 'CategoryController@create']);
        $router->get('show/{id}', ['uses' => 'CategoryController@show']);
        $router->put('edit/{id}', ['uses' => 'CategoryController@edit']);
        $router->delete('delete/{id}', ['uses' => 'CategoryController@delete']);
    });
    $router->group(['prefix' => 'menu'], function () use ($router) {
        $router->get('list', ['uses' => 'MenuController@list']);
        $router->post('create', ['uses' => 'MenuController@create']);
        $router->get('show/{id}', ['uses' => 'MenuController@show']);
        $router->put('edit/{id}', ['uses' => 'MenuController@edit']);
        $router->delete('delete/{id}', ['uses' => 'MenuController@delete']);
    });
});