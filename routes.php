<?php

use Pecee\SimpleRouter\SimpleRouter;

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET, PUT, DELETE');
header('Access-Control-Allow-Headers: Content-Type, X-Requested-With, Access-Control-Allow-Origin, Access-Control-Allow-Headers');
header('Content-Type: application/json');

SimpleRouter::group(['prefix' => '/api/v1'], function () {
    SimpleRouter::post('/create/user', 'PostController@index')->name('api.user');
    SimpleRouter::post('/auth', 'AuthController@login')->name('api.auth');
    SimpleRouter::post('/send', 'MailController@send')->name('api.send');
});