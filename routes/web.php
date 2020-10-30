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
$router->post('/api/login','GenerateTokenController@generateToken');
$router->post('api/registre_se','RecordController@generateRegister');

$router->group(['prefix' => 'api','middleware' => 'auth'], function () use ($router) {

    $router->group(['prefix' => 'registro'], function () use ($router) {

        $router->get('', 'RecordController@index');
        //$router->post('', 'RecordController@store');
        $router->get('{id}', 'RecordController@show');
        $router->put('{id}', 'RecordController@update');
        $router->delete('{id}', 'RecordController@destroy');


        $router->get('{recordId}/documentos', 'DocumentController@indexDoc');
        $router->get('{recordId}/veiculos', 'VeicleController@indexVeicles');


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

        $router->get('', 'VeicleController@index');
        $router->post('', 'VeicleController@store');
        $router->get('{id}', 'VeicleController@show');
        $router->put('{id}', 'VeicleController@update');
        $router->delete('{id}', 'VeicleController@destroy');

    });

    $router->group(['prefix' => 'suspeitos'], function () use ($router) {

        $router->get('','SuspectsController@index');
        $router->post('','SuspectsController@store');
        $router->get('{id}', 'SuspectsController@show');
        $router->put('{id}', 'SuspectsController@update');
        $router->delete('{id}', 'SuspectsController@destroy');
    });

});
