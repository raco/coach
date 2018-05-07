<?php


Route::post('login', 'AuthController@authenticate');

Route::get('profile', 'ClientController@profile');
Route::post('profile/update', 'ClientController@updateProfile');

Route::get('products', 'ProductsController@list');

Route::get('diets', 'DietController@list');

Route::get('tasks', 'TaskController@list');
Route::post('tasks/complete/{task}', 'TaskController@update');

Route::get('messages', 'MessagesController@list');
Route::post('messages/send', 'MessagesController@send');
Route::post('messages/seen/{message}', 'MessagesController@seen');

Route::post('buyingrequest/send', 'BuyingrequestsController@send');
