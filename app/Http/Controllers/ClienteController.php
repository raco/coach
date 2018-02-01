<?php

namespace App\Http\Controllers;
use App\Client;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClienteController extends Controller
{
    public function create(){
    	return view('clientes/index'); 
    }

    public function list()
    {
    	$clientes = Client::with('user')->with('coach')->get();
    	return view('admin.pages.clients.list',compact('clientes'));
    }

    public function edit(Client $client) 
    {
    	return view('admin.pages.clients.edit', compact('client'));
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
		$user->save();
		$client->save();
    }

} 
