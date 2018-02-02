<?php

use Illuminate\Http\Request;

Route::post('login', 'AuthController@authenticate');

Route::middleware('auth:api')->post('/user', function (Request $request) {
    return $request->user();
});
