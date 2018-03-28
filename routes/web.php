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

	// Clientes
	Route::get('clients', 'ClientController@list')->name('client.list');
	Route::get('clients/edit/{client}', 'ClientController@edit')->name('client.edit');
	Route::post('clients/edit/{client}', 'ClientController@update')->name('client.update');
	Route::get('clients/create', 'ClientController@create')->name('client.create');
	Route::post('clients/create', 'ClientController@store')->name('client.store');
	Route::post('clients/search', 'ClientController@search')->name('client.search');
	Route::delete('clients/delete/{client}', 'ClientController@delete')->name('client.delete');
	Route::post('clients/uppassword/{client}', 'ClientController@updpass')->name('client.updatePass');
	
	Route::get('clients/messages/{id}', 'ClientController@messages')->name('client.messages');
	Route::get('clients/medical/{client}', 'ClientController@medicalData')->name('client.medical');
	Route::put('clients/medical/update/{client}', 'ClientController@updateMedicalData')->name('client.medical.update');

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
	Route::delete('products/delete/{product}', 'ProductController@destroy')->name('product.delete');
	
	// DIETS
	Route::get('diets', 'DietController@list')->name('diet.list');
	
	Route::get('diets/create', 'DietController@create')->name('diet.create');
	Route::post('diets/create', 'DietController@store')->name('diet.store');
	
	Route::get('diets/edit/{diet}', 'DietController@edit')->name('diet.edit');
	Route::put('diets/update/{diet}', 'DietController@update')->name('diet.update');
	Route::delete('diets/delete/{diet}', 'DietController@destroy')->name('diet.delete');
	
	// BUYING REQUEST
	Route::get('buyingrequests', 'BuyingrequestController@list')->name('buyingrequest.list');
	Route::put('buyingrequests/update/{buyingrequest}', 'BuyingrequestController@update')->name('buyingrequest.update');
	
	// POSTS
	Route::get('posts', 'PostController@list')->name('post.list');
	
	Route::get('posts/create', 'PostController@create')->name('post.create');
	Route::post('posts/create', 'PostController@store')->name('post.store');
	
	Route::get('posts/edit/{post}', 'PostController@edit')->name('post.edit');
	Route::put('posts/update/{post}', 'PostController@update')->name('post.update');
	Route::delete('posts/delete/{post}', 'PostController@destroy')->name('post.delete');

	// APPOINTMENTS
	Route::get('appointments', 'AppointmentController@list')->name('appointment.list');
	Route::get('appointments/create', 'AppointmentController@create')->name('appointment.create');
	Route::post('appointments/create', 'AppointmentController@store')->name('appointment.store');
	
	Route::get('appointments/edit/{appointment}', 'AppointmentController@edit')->name('appointment.edit');
	Route::put('appointments/update/{appointment}', 'AppointmentController@update')->name('appointment.update');
	Route::delete('appointments/delete/{appointment}', 'AppointmentController@destroy')->name('appointment.delete');

	// IMAGE
	Route::get('images', 'ImageController@list')->name('image.list');
	Route::get('images/edit/{image}', 'ImageController@edit')->name('image.edit');
	Route::put('images/update/{image}', 'ImageController@update')->name('image.update');
	Route::delete('images/delete/{image}', 'ImageController@destroy')->name('image.delete');
});

Route::middleware(['auth', 'coach'])->namespace('Coach')->prefix('coach')->group(function () {
	
	Route::get('dashboard', 'CoachController@dashboard')->name('coach.dashboard');
	Route::post('coach/uploadphoto', 'CoachController@uploadPhoto')->name('coach.photo');
	
	// Clientes
	Route::get('clients', 'CoachController@clientList')->name('coach.client.list');
	Route::get('clients/show/{client}', 'CoachController@clientShow')->name('coach.client.show');

	// Update de frase del coach
	Route::post('coaches/updphrase', 'CoachController@updphrase')->name('coach.updphrase');

	// IMAGE
	Route::get('images', 'ImageController@list')->name('coach.image.list');
	Route::get('images/show/{image}', 'ImageController@show')->name('coach.image.show');

	// DIETS
	Route::get('diets', 'DietController@list')->name('coach.diet.list');
	
	Route::get('diets/create', 'DietController@create')->name('coach.diet.create');
	Route::post('diets/create', 'DietController@store')->name('coach.diet.store');
	
	Route::get('diets/edit/{diet}', 'DietController@edit')->name('coach.diet.edit');
	Route::put('diets/update/{diet}', 'DietController@update')->name('coach.diet.update');
	Route::delete('diets/delete/{diet}', 'DietController@destroy')->name('coach.diet.delete');

	// PRODUCTOS
	Route::get('products', 'ProductController@list')->name('coach.product.list');
	
	Route::get('products/create', 'ProductController@create')->name('coach.product.create');
	Route::post('products/create', 'ProductController@store')->name('coach.product.store');
	
	Route::get('products/edit/{product}', 'ProductController@edit')->name('coach.product.edit');
	Route::put('products/update/{product}', 'ProductController@update')->name('coach.product.update');
	Route::delete('products/delete/{product}', 'ProductController@destroy')->name('coach.product.delete');

	// BUYING REQUEST
	Route::get('buyingrequests', 'BuyingrequestController@list')->name('coach.buyingrequest.list');
	Route::get('buyingrequests/show/{buyingrequest}', 'BuyingrequestController@show')->name('coach.buyingrequest.show');
	Route::put('buyingrequests/update/{buyingrequest}', 'BuyingrequestController@update')->name('coach.buyingrequest.update');

	// APPOINTMENTS
	Route::get('appointments', 'AppointmentController@list')->name('coach.appointment.list');
	Route::get('appointments/create', 'AppointmentController@create')->name('coach.appointment.create');
	Route::post('appointments/create', 'AppointmentController@store')->name('coach.appointment.store');
	
	Route::get('appointments/edit/{appointment}', 'AppointmentController@edit')->name('coach.appointment.edit');
	Route::put('appointments/update/{appointment}', 'AppointmentController@update')->name('coach.appointment.update');
	Route::delete('appointments/delete/{appointment}', 'AppointmentController@destroy')->name('coach.appointment.delete');
});