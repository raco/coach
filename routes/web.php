<?php
Auth::routes();

// Listado de Coach
Route::get('coaches', 'CoachController@list')->name('coach.list');
// Listado de Clientes
Route::get('clients','ClienteController@list')->name('client.list');
//Editar Cientes
Route::get('clients/edit/{client}','ClienteController@edit')->name('client.edit');
// Actualiza Clientes

Route::post('clients/edit/{client}','ClienteController@update')->name('client.update');








