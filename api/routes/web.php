<?php

/** @var Router $router */

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

use Laravel\Lumen\Routing\Router;

$router->group(['prefix' => 'ui', 'middleware' => 'appAuth'], function () use ($router) {
    $router->get('categories-tree', 'CategoryController@navigationTree');
});

$router->group(['middleware' => 'cmsAuth'], function () use ($router) {
    apiResource($router, 'categories', 'CategoryController');
});

/**
 * Route an API resource to a controller.
 *
 * @param Router $router
 * @param string $name
 * @param string $controller
 * @param array $options
 *
 * @return void
 */
function apiResource(Router $router, string $name, string $controller, array $options = []): void
{
    $actions = $options['only'] ?? ['index', 'store', 'show', 'update', 'destroy'];

    if (isset($options['except'])) {
        $actions = array_diff($actions, (array)$options['except']);
    }

    foreach ($actions as $action) {
        switch ($action) {
            case 'index':
                $router->get($name, ['as' => "$name.index", 'uses' => "$controller@index"]);
                break;
            case 'store':
                $router->post($name, ['as' => "$name.store", 'uses' => "$controller@store"]);
                break;
            case 'show':
                $router->get("$name/{id}", ['as' => "$name.show", 'uses' => "$controller@show"]);
                break;
            case 'update':
                $router->put("$name/{id}", ['as' => "$name.update", 'uses' => "$controller@update"]);
                $router->patch("$name/{id}", ['as' => "$name.update", 'uses' => "$controller@update"]);
                break;
            case 'destroy':
                $router->delete("$name/{id}", ['as' => "$name.destroy", 'uses' => "$controller@destroy"]);
                break;
        }
    }
}
