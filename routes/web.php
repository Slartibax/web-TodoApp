<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SignUpController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MailConfirmController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes(['verify' => false]);

Route::middleware('auth')->prefix('/dashboard')->group(function (){
    Route::get('',[DashboardController::class, 'resolve'])->name('dashboard');
    Route::resource('project',\App\Http\Controllers\ProjectResourceController::class);
    Route::resource('project/{project}/task',\App\Http\Controllers\TaskResourceController::class);
});

Route::fallback(function (){return redirect()->route('login');});
