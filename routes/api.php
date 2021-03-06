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

 

Route::group(['prefix'=>'/auth',['middleware'=>'throttle:20,5']],function(){
    Route::post('/register','App\Http\Controllers\api\Auth\RegisterController@register');
    Route::post('/login','App\Http\Controllers\api\Auth\LoginController@login');
});

Route::group(['middleware'=>'jwt.auth'],function(){
    Route::get('/me','App\Http\Controllers\api\MeController@index');
    Route::get('/auth/logout','App\Http\Controllers\api\MeController@logout');
});