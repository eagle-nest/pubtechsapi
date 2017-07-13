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

//$app->get('/', function () use ($app) {
//    return $app->version();
//});
$app->group(['prefix' => 'api/v1'], function($app) {
    $app->get('user/{id}', 'UserController@getUser');

    $app->post('user', 'UserController@createUser');

    $app->delete('user/{id}', 'UserController@deleteUser');

    $app->post('user/login', 'UserController@login');

    $app->post('user/signup', 'UserController@signup');

    $app->post('user/forgot', 'UserController@forgotPassword');
    $app->post('user/reset/{token}', 'UserController@resetPassword');
    $app->get('user/verification/{token}', 'UserController@userVerification');
});
