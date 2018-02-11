<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Client;
use App\Coach;
use App\User;


class ClientController extends Controller
{
    public function index(){
    	return view('clientes/index');
    }

    public function list()
    {

		$clientes = DB::table('clients')
		->leftJoin('users as u','clients.user_id','=', 'u.id')
		->join('coaches as c','clients.coach_id','=', 'c.id')
		->join('users as d','d.id','=', 'c.user_id')
		// ->select('u.name', 'd.name as coach_name')->get();
		->select(DB::raw('u.id as idclient,CONCAT(u.name," ", u.lastname) as Cliente, CONCAT(d.name," ", d.lastname) as Coach, u.phone, u.email,u.gender,c.state,c.id as idcoach'))->get();
		   // dd($clientes );
		return view('admin.pages.clients.list',compact('clientes'));


    	// $clientes = Client::with('user')->with('coach')->get();
    	// return view('admin.pages.clients.list',compact('clientes'));
    }

    public function edit(Client $client)
    {
    	// dd($client);
    	// Me manda toda la lista de coaches
    	$coaches = Coach::with('user')->get();

    	$client=Client::with('user')
    	->where('clients.user_id','=', $client->id)->first();
    	  // dd($client->user->name);
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
	    $client->state="1";
	    $client->coach_id=$request['coach'];
	    $client->save();
        \Session::flash('flash_message','Nuevo Cliente ha sido agregado');

	    return redirect()->back();
    }

	public function search (Request $request) 
 	{

 		 // dd($request );
 		$sbuscar= $request['txtbuscar'];
 		$clientes = DB::table('clients')
		->leftJoin('users as u','clients.user_id','=', 'u.id')
		->join('coaches as c','clients.coach_id','=', 'c.id')
		->join('users as d','d.id','=', 'c.user_id')
		// ->select('u.name', 'd.name as coach_name')->get();
		->select(DB::raw('u.id as idclient,CONCAT(u.name," ", u.lastname) as Cliente, CONCAT(d.name," ", d.lastname) as Coach, u.phone, u.email,u.gender,c.state,c.id as idcoach'))
		->where('u.name','like',"%{$sbuscar}%")
		->orwhere('u.lastname','like',"%{$sbuscar}%")
		 ->orwhere('u.phone','like',"%{$sbuscar}%")
		 ->orwhere('u.email','like',"%{$sbuscar}%")
		->get();


		 // dd($Datos );
		return view('admin.pages.clients.list',compact('clientes'));
			  
 	}

}

