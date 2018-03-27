<?php

namespace App\Http\Controllers\Admin;


use App\User;
use App\Coach;
use App\Client;
use App\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller; 


class ClientController extends Controller
{
    public function index(){
    	return view('clientes/index');
    }

    public function list()
    {
    	$clientes = Client::with('user')->with('coach')->get();
    	return view('admin.pages.clients.list',compact('clientes'));
    }

    public function edit(Client $client)
    {
    	$coaches = Coach::with('user')->get();
    	return view('admin.pages.clients.edit', compact('client','coaches'));
    }

    public function update($id, Request $request)
    {
		$client= Client::findOrFail($id);
		$user = User::findOrFail($client->user_id);

		$user->name = $request['name'];
		$user->lastname = $request['lastname'];
		$user->gender = $request['sexo'];
		$user->phone = $request['phone'];
		$user->email = $request['email'];
		$client->state = isset($request['state']);
		$client->coach_id = ($request['coach'] != 'none') ? $request['coach'] : null;

		$user->save();
		$client->save();

		\Session::flash('flash_message','Dato de cliente ha sido actualizado');
		return redirect()->back();
    }

	public function create()
	{
        $coaches = Coach::with('user')->get();
  		return view('admin.pages.clients.create',compact('coaches')) ;
    }

    public function store (Request $request)
    {
        $client = new Client;
	    $user = new User;
	    $user->name = $request['name'];
	    $user->lastname = $request['lastname'];
	    $user->gender = $request['sexo'];
	    $user->phone = $request['phone'];
	    $user->email = $request['email'];
	    $user->password = bcrypt($request['password']);
	    $user->save();

	    $client->user_id = $user->id;
	    $client->state = true;
	    $client->coach_id = ($request['coach'] != 'none') ? $request['coach'] : null;
	    $client->save();
        \Session::flash('flash_message','Nuevo Cliente ha sido agregado');

	    return redirect()->back();
    }

 	public function delete($client)
 	{
 		Client::findOrfail($client)->delete();
 		\Session::flash('flash_message2','El cliente ha sido eliminado correctamente');
		return redirect()->back();
 	}

 	public function updpass($id, Request $request) 
   	{
		$client = Client::findOrfail($id);
		$user = User::findOrFail($client->id);
		$user->password= bcrypt($request['password']);
		\Session::flash('flash_message2','La contraseña ha sido modificada');
		$user->save();
		return redirect()->back();
	}
	   
	public function messages($id)
	{
		$messages = Message::where('from_id', $id)->orWhere('to_id', $id)->get();
  		return view('admin.pages.clients.messages', compact('messages', 'id')) ;
	}
}

