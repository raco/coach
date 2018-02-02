<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Coach;
use App\User;

class CoachController extends Controller
{
    public function list()
    {
        $coaches = Coach::with('user')->get();
        return view('admin.pages.coaches.list', compact('coaches'));
    }

   	public function edit(Coach $coach)
   	{
		return view('admin.pages.coaches.edit',compact('coach'));
  	}

   	public function update($id, Request $request)
   	{
		$coach = Coach::findOrfail($id);
		$user = User::findOrFail($coach->id);
		$user->name = $request['name'];
		$user->lastname = $request['lastname'];
		$user->gender = $request['sexo'];
		$user->phone = $request['phone'];
		$user->email = $request['email'];
		$coach->state = isset($request['state']);
		$coach->user_id = $user->id;
		$user->save();
		$coach->save();
		\Session::flash('flash_message','Dato del Coach ha sido actualizado');
		return redirect()->back();
   	}

   	public function create(){
		return view('admin.pages.coaches.create');
   	}

   	public function store(Request $request){
		$coach = new Coach;
		$user = new User;
		$user->name = $request['name'];
		$user->lastname = $request['lastname'];
		$user->gender = $request['sexo'];
		$user->phone = $request['phone'];
		$user->email = $request['email'];
		$user->password = bcrypt($request['password']);

		$user->save();
		$coach->user_id = $user->id;
		$coach->state = true;
		$coach->save();
		return redirect()->back();
   }
}
