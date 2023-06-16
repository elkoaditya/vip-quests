<?php

use Illuminate\Support\Facades\Route;

Route::get('/login', [\App\Http\Controllers\Auth\UserLoginController::class, 'index']);
Route::post('/login', [\App\Http\Controllers\Auth\UserLoginController::class, 'login']);
Route::post('/logout', [\App\Http\Controllers\Auth\UserLoginController::class, 'logout']);
Route::get('/login/register', [\App\Http\Controllers\Auth\UserLoginController::class, 'registerAdmin']);

Route::get('/', [\App\Http\Controllers\RootController::class, 'index']);
Route::group([
    'prefix' => 'admin'
], function () {
    Route::get('/home', [\App\Http\Controllers\Admin\HomeController::class, 'index']);
    Route::post('/home/add-vip', [\App\Http\Controllers\Admin\HomeController::class, 'addVip']);
    Route::post('/home/show-vip', [\App\Http\Controllers\Admin\HomeController::class, 'showVip']);
    Route::post('/home/import-vip', [\App\Http\Controllers\Admin\HomeController::class, 'importVip']);
});

Route::get('/test', function (){
   return view('welcome');
});
