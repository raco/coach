<?php
Auth::routes();

Route::get('coaches', 'CoachController@list')->name('coach.list');






