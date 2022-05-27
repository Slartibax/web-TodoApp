<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Эта обертка для более корректного именования маршрутов
Route::name('api.')->group(function(){

    Route::prefix('v1')->namespace('App\Http\Controllers\Api\V1')->group(function (){
        Route::apiResource('projects','ProjectsController');
        Route::apiResource('projects.tasks','TasksController');
    });

});
