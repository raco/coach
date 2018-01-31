<?php

namespace App\Http\Controllers;
use App\Client;
use App\User;
use Illuminate\Http\Request;

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
} 
