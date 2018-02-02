<?php

namespace App\Http\Controllers\Coach;

use App\Client;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CoachController extends Controller
{
    public function dashboard()
    {
    	return view('coach.pages.dashboard');
    }

    public function clientList()
    {
    	$clients = Client::where('coach_id', auth()->user()->id)->get();
    	return view('coach.pages.clients', compact('clients'));
    }
}
