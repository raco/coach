<?php
Route::get('/', function () {
    return redirect('/login');
});
Route::get('/dashboard', function () {
    return (auth()->user()->admin)? redirect('/admin/dashboard') : redirect('/coach/dashboard');
});
Auth::routes();

Route::middleware(['auth', 'admin'])->namespace('Admin')->prefix('admin')->group(function () {
	// Muestra Dashboard
	Route::get('dashboard', 'AdminController@dashboard')->name('admin.dashboard');
	// Valida email del client
	Route::post('validate/email', 'AdminController@validateEmail')->name('validate.email');

	// Listado de Clientes
	Route::get('clients', 'ClientController@list')->name('client.list');
	//Editar Cientes
	Route::get('clients/edit/{client}', 'ClientController@edit')->name('client.edit');
	// Actualiza Clientes
	Route::post('clients/edit/{client}', 'ClientController@update')->name('client.update');
	// Llama al formulario para  nuevo Cliente
	Route::get('clients/create', 'ClientController@create')->name('client.create');
		// Graba datos del Cliente
	Route::post('clients/create', 'ClientController@store')->name('client.store');






	// Listado de Coach
	Route::get('coaches', 'CoachController@list')->name('coach.list');
	// Editar Coach
	Route::get('coaches/edit/{coach}', 'CoachController@edit')->name('coach.edit');
	// Update Coach
	Route::post('coaches/edit/{coach}', 'CoachController@update')->name('coach.update');
	// Llama al formulario para  nuevo Coach
	Route::get('coaches/create', 'CoachController@create')->name('coach.create');
	// Graba datos del coach
	Route::post('coaches/create', 'CoachController@store')->name('coach.store');
	// Actualiza contraseña del coach
	Route::post('coaches/uppassword/{client}', 'CoachController@updpass')->name('coach.UpdatepasswordCoach');
	// Multi Busqueda  del coach
	Route::post('coaches/search', 'CoachController@search')->name('coach.search');
	

});

Route::middleware(['auth', 'coach'])->namespace('Coach')->prefix('coach')->group(function () {
	// Listado de Clientes del coach
	Route::get('dashboard', 'CoachController@dashboard')->name('coach.dashboard');
	Route::get('clients', 'CoachController@clientList')->name('coach.client.list');

	// Update de frase del coach
	Route::post('coaches/updphrase', 'CoachController@updphrase')->name('coach.updphrase');
});