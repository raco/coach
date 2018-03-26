	<?php
Route::get('/', function () {
    return redirect('/login');
});
Route::get('/dashboard', function () {
	if (auth()->check()) {
    	return (auth()->user()->admin)? redirect('/admin/dashboard') : redirect('/coach/dashboard');
	} else {
		\Session::flash('flash_error_message', 'Este usuario no se encuentra activo, consulte con el administrador.');
		return redirect('/login');
	}
});

Auth::routes();

Route::middleware(['auth', 'admin'])->namespace('Admin')->prefix('admin')->group(function () {
	// Muestra Dashboard
	Route::get('dashboard', 'AdminController@dashboard')->name('admin.dashboard');
	// Valida email del client
	Route::post('validate/email', 'AdminController@validateEmail')->name('validate.email');
	Route::post('updatePass', 'AdminController@updatePass')->name('admin.updatePass');

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
		// Multi Busqueda  del Cliente
	Route::post('clients/search', 'ClientController@search')->name('client.search');
	Route::delete('clients/delete/{client}', 'ClientController@delete')->name('client.delete');
	// Actualiza contraseña del coach
	Route::post('clients/uppassword/{client}', 'ClientController@updpass')->name('client.updatePass');
 

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
	
	Route::delete('coaches/delete/{coach}', 'CoachController@delete')->name('coach.delete');
	
	
	// PRODUCTOS
	Route::get('products', 'ProductController@list')->name('product.list');
	
	Route::get('products/create', 'ProductController@create')->name('product.create');
	Route::post('products/create', 'ProductController@store')->name('product.store');
	
	Route::get('products/edit/{product}', 'ProductController@edit')->name('product.edit');
	Route::put('products/update/{product}', 'ProductController@update')->name('product.update');

	// DIETS
	Route::get('diets', 'DietController@list')->name('diet.list');
	
	Route::get('diets/create', 'DietController@create')->name('diet.create');
	Route::post('diets/create', 'DietController@store')->name('diet.store');
	
	Route::get('diets/edit/{diet}', 'DietController@edit')->name('diet.edit');
	Route::put('diets/update/{diet}', 'DietController@update')->name('diet.update');
	
	// BUYING REQUEST
	Route::get('buyingrequests', 'BuyingrequestController@list')->name('buyingrequest.list');
	Route::put('buyingrequests/update/{buyingrequest}', 'BuyingrequestController@update')->name('buyingrequest.update');
	
	// POSTS
	Route::get('posts', 'PostController@list')->name('post.list');
	
	Route::get('posts/create', 'PostController@create')->name('post.create');
	Route::post('posts/create', 'PostController@store')->name('post.store');
	
	Route::get('posts/edit/{post}', 'PostController@edit')->name('post.edit');
	Route::put('posts/update/{post}', 'PostController@update')->name('post.update');
});

Route::middleware(['auth', 'coach'])->namespace('Coach')->prefix('coach')->group(function () {
	// Listado de Clientes del coach
	Route::get('dashboard', 'CoachController@dashboard')->name('coach.dashboard');
	Route::get('clients', 'CoachController@clientList')->name('coach.client.list');
	Route::post('coach/uploadphoto', 'CoachController@uploadPhoto')->name('coach.photo');

	// Update de frase del coach
	Route::post('coaches/updphrase', 'CoachController@updphrase')->name('coach.updphrase');
});