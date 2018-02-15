<?php

namespace App\Http\Controllers\Admin;

use App\Coach;
use App\Http\Controllers\Controller;
use App\User;
use Faker\Provider\pt_BR\phone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CoachController extends Controller
{
    public function list()
    {
		$coaches=DB::table('coaches')
		->select(DB::raw('coaches.id,CONCAT(users.name," ", users.lastname) AS full_name,users.phone,users.email,users.gender,coaches.state','coaches.phrase'))
		->join('users','users.id','=','coaches.user_id')->get();

        return view('admin.pages.coaches.list', compact('coaches'));
    }

   	public function edit(Coach $coach)
   	{
   		$clients = $coach->client;
		return view('admin.pages.coaches.edit',compact('coach', 'clients'));
  	}

   	public function update($id, Request $request)
   	{
		$coach = Coach::findOrfail($id);
		$user = $coach->user;
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

   	public function create()
   	{
		return view('admin.pages.coaches.create');
   	}

   	public function store(Request $request)
   	{
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
		$coach->phrase = $request['txtphrase'];

		$coach->save();
		\Session::flash('flash_message','Nuevo Coach ha sido agregado');
		return redirect()->back();
   }


    public function updpass($id ,Request $request) 
   {
		$coach = Coach::findOrfail($id);
		$user = User::findOrFail($coach->id);
		$user->password= bcrypt($request['passcoach2']);
		\Session::flash('flash_message2','La contraseña ha sido modificado');
		$user->save();
		return redirect()->back();
   }

    public function search(Request $request)
    {
		$sbuscar= $request['txtbuscoach'];

		$coaches=DB::table('coaches')
		->select(DB::raw('coaches.id,CONCAT(users.name," ", users.lastname) AS full_name,users.phone,users.email,users.gender,coaches.state,coaches.phrase'))
		->join('users','users.id','=','coaches.user_id')
		->where('name','like',"%{$sbuscar}%")
		->orwhere('lastname','like',"%{$sbuscar}%")
		 ->orwhere('phone','like',"%{$sbuscar}%")
		 ->orwhere('email','like',"%{$sbuscar}%")
		->get();
		  // dd($coaches);
	  	return view('admin.pages.coaches.list',compact('coaches'));
 	}



}
