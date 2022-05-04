<?php

use App\Http\Controllers\TaskController;
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

//    Route::get('/login',[LoginController::class, 'show'])->name('login.show');
//    Route::get('/signUp',[SignUpController::class, 'show'])->name('signUp.show');
//  Route::get('/mailConfirm/required',[MailConfirmController::class, 'show'])->name('mailConfirm.required');
//   Route::get('/mailConfirm/confirmed',[MailConfirmController::class, 'show'])->name('mailConfirm.confirmed');

//   Route::post('/login',[LoginController::class,'authenticate'])->name('login.auth');
//   Route::post('/signUp',[SignUpController::class,'create'])->name('signUp.create');
//   Route::get('logout',[LoginController::class,'logout'])->name('logout');


Auth::routes(['verify' => false]);

Route::middleware('auth')->prefix('/dashboard')->group(function (){
    Route::get('',[DashboardController::class, 'resolve'])->name('dashboard');
    Route::resource('project',\App\Http\Controllers\ProjectResourceController::class);
    Route::resource('project/{project}/task',\App\Http\Controllers\TaskResourceController::class);
});


Route::fallback(function (){return redirect()->route('login');});

