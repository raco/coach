<?php
Route::get('/', function () {
    return redirect('/login');
});
Auth::routes();

// Listado de Clientes
Route::get('clients','ClienteController@list')->name('client.list');
//Editar Cientes
Route::get('clients/edit/{client}','ClienteController@edit')->name('client.edit');
// Actualiza Clientes
Route::post('clients/edit/{client}','ClienteController@update')->name('client.update');
// Llama al formulario para  nuevo Cliente
Route::get('clients/create','ClienteController@create')->name('client.create');
// Graba datos del coach
Route::post('clients/create','ClienteController@store')->name('client.store');

// Listado de Coach
Route::get('coaches', 'CoachController@list')->name('coach.list');
// Editar Coach
Route::get('coaches/edit/{coach}','CoachController@edit')->name('coach.edit');
// Update Coach
Route::post('coaches/edit/{coach}','CoachController@update')->name('coach.update');
// Llama al formulario para  nuevo Coach
Route::get('coaches/create','CoachController@create')->name('coach.create');
// Graba datos del coach
Route::post('coaches/create','CoachController@store')->name('coach.store');
