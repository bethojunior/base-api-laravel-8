<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Authenticate\AuthenticateController;
use App\Http\Controllers\User\UserController;

Route::group(['prefix' => 'auth'], function () {
    Route::group(['as' => 'auth'], function () {
        Route::post('register',[AuthenticateController::class, 'register']);
        Route::post('login',[AuthenticateController::class, 'login']);
    });
});

Route::group(['middleware' => ['auth:sanctum']], function (){

});


Route::middleware('auth:sanctum')
    ->group(base_path('routes/private/user.php'));
