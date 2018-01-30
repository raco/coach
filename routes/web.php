<?php
Auth::routes();

// Listado de Coach
Route::get('coaches', 'CoachController@list')->name('coach.list');
// Listado de Clientes
Route::get('clients','ClienteController@list')->name('client.list');







