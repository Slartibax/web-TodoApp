<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SignInController;
use App\Http\Controllers\SignUpController;
use App\Http\Controllers\WorkspaceController;
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


Route::prefix('/auth')->group(function (){
    Route::get('signIn',[SignInController::class, 'show']);
    Route::get('signUp',[SignUpController::class, 'show']);
    Route::get('mailConfirm/required',[MailConfirmController::class, 'show']);
    Route::get('mailConfirm/confirmed',[MailConfirmController::class, 'show']);

    Route::post('signIn',[SignInController::class,'index']);
    Route::post('signUp',[SignUpController::class,'create']);
});

Route::get('/workspace/{projectId}',[WorkspaceController::class,'show']);

Route::fallback(function (){return redirect('/auth/signIn');});





