<?php

namespace App\Http\Controllers;
use App\Client;
use App\User;
use App\Coach;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClienteController extends Controller
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
    	     // dd($coaches);
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
		$client->coach_id = $request['coach'];

		$user->save();
		$client->save();
		\Session::flash('flash_message','Dato de cliente ha sido actualizado');
		return redirect()->back();
    }

    public function create(){
        $coaches = Coach::with('user')->get();
  return view('admin.pages.clients.create',compact('coaches')) ; 
    } 

    public function store (Request $request){
        $client = new Client;
     $user = new User;
    // dd($request);
    $user->name = $request['name'];
    $user->lastname = $request['lastname'];
    $user->gender = $request['sexo'];
    $user->phone = $request['phone'];
    $user->email = $request['email'];
    $user->password = bcrypt($request['password']);

    $user->save();
    $client->user_id = $user->id;
    $client->state="1";
    $client->coach_id=$request['coach'];
    $client->save();

    return redirect()->back();


    }


} 
