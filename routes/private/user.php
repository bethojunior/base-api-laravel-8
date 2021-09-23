<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;

Route::group(['prefix' => 'user'], function () {
    Route::group(['as' => 'user'], function (){
        Route::get('list',[UserController::class, 'list']);
    });
});
