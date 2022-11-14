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
    echo phpinfo();

//    try {
//        \Illuminate\Support\Facades\DB::connection()->getPDO();
//        echo \Illuminate\Support\Facades\DB::connection()->getDatabaseName();
//    } catch (\Exception $e) {
//        echo 'None';
//    }
});
