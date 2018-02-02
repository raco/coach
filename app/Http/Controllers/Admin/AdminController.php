<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function dashboard()
    {
    	return view('admin.pages.dashboard');
    }

    public function validateEmail(Request $request)
	{
		$validation = Validator::make(
			$request->all(),
			['email' => 'required|string|email|max:255|unique:users'],
			[
				'email.required' => "El campo está vacío",
				'email.max' => "La cantidad de caracteres excede el límite.",
				'email.unique' => "Este correo ya está siendo usado, intenta con otro.",
			]);

	    if ($validation->fails()) {
	        return response()->json(['errors' => $validation->errors()->get('email')], 422);
	    } else {
	        return response()->json(['success' => true], 200);
	    }
	}
}
