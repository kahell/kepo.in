<?php

use Illuminate\Http\Request;

Route::middleware('auth:api')->group(function() {
    Route::post('logout', 'LoginController@logout');
});

Route::post('register', 'RegisterController@register');
Route::post('login', 'LoginController@login');
Route::post('refresh', 'LoginController@refresh');

Route::apiResource('/asks', 'AskController');
Route::group(['prefix' => 'asks'], function(){
  Route::apiResource('/{ask}/answere', 'AnswereController');
  Route::apiResource('/{ask}/like', 'LikeController');
});
