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

	public function updatePass(Request $request) 
	{
		$this->validate($request, [
            'password' => 'required|string|min:6',
        ], [
            'password.required' => "Error, debes ingresar una contraseña.",
            'password.string' => "Error, la contraseña debe no llevar caracteres especiales.",
            'password.min' => "Error, el número de caracteres no debe ser menor de 6.",
        ]);
        
		$user = auth()->user();
		$user->password = bcrypt($request['password']);
		$user->save();
		\Session::flash('flash_message','La contraseña ha sido modificada');
		return redirect()->back();
	}
}
