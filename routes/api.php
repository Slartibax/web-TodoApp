<?php

use App\Http\Controllers\Api\V1\LoginController;
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


Route::name('api.')->namespace('App\Http\Controllers\Api')->group(function(){
    Route::prefix('v1')->namespace('V1')->group(function (){

        Route::post('/login',[LoginController::class, 'login'])->name('login');

        Route::middleware(['auth:sanctum'])->group(function(){
            Route::apiResource('projects','ProjectsController');
            Route::apiResource('projects.tasks','TasksController');
        });
    });

});
