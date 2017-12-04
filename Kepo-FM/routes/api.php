<?php

use Illuminate\Http\Request;

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('register', 'RegisterController@register');

Route::apiResource('/asks', 'AskController');

Route::group(['prefix' => 'asks'], function(){
  Route::apiResource('/{ask}/answere', 'AnswereController');
});
