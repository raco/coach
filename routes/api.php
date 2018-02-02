<?php

use Illuminate\Http\Request;

Route::post('login', 'AuthController@authenticate');

Route::get('profile', 'ClientController@profile');
Route::post('profile/update', 'ClientController@updateProfile');
