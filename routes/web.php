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

    $router->group(['prefix' => 'registro'], function () use ($router) {

        $router->get('', 'RecordController@index');
        $router->post('', 'RecordController@store');
        $router->get('{id}', 'RecordController@show');
        $router->put('{id}', 'RecordController@update');
        $router->delete('{id}', 'RecordController@destroy');

        $router->post('{id_record}/documentos', 'DocumentsController@storeDoc');


    });

    $router->group(['prefix' => 'registro-completo'], function () use ($router) {

        $router->get('', 'RecordCompleteController@index');
        $router->post('', 'RecordCompleteController@store');
        $router->get('{id}', 'RecordCompleteController@show');
        $router->put('{id}', 'RecordCompleteController@update');
        $router->delete('{id}', 'RecordCompleteController@destroy');

    });

    $router->group(['prefix' => 'documentos'], function () use ($router) {

        $router->get('', 'DocumentsController@index');
        $router->post('', 'DocumentsController@store');
        $router->get('{id}', 'DocumentsController@show');
        $router->put('{id}', 'DocumentsController@update');
        $router->delete('{id}', 'DocumentsController@destroy');

    });

    $router->group(['prefix' => 'veiculos'], function () use ($router) {

        $router->get('', 'VeiclesController@index');
        $router->post('', 'VeiclesController@store');
        $router->get('{id}', 'VeiclesController@show');
        $router->put('{id}', 'VeiclesController@update');
        $router->delete('{id}', 'VeiclesController@destroy');

    });

    $router->group(['prefix' => 'suspeitos'], function () use ($router) {

        $router->get('','SuspectsController@index');
        $router->post('','SuspectsController@store');
        $router->get('{id}', 'SuspectsController@show');
        $router->put('{id}', 'SuspectsController@update');
        $router->delete('{id}', 'SuspectsController@destroy');
    });

});
