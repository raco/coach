<?php

namespace App\Http\Controllers\Coach;

use App\Client;
use App\Coach;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CoachController extends Controller
{
    public function dashboard()
    {
        // dd(auth()->user()->id);
        $dusermail = auth()->user()->id;
        $coaches=DB::table('coaches')
         ->select(DB::raw('coaches.phrase'))
         ->where('user_id','=',$dusermail )->first(); 
// dd($coaches);

    	return view('coach.pages.dashboard',compact('coaches'));
    }

    public function clientList()
    {
    	$clients = Client::where('coach_id', auth()->user()->id)->get();
    	// dd ($clients);
    	return view('coach.pages.clients', compact('clients'));
    }

    public function updphrase(Request $request)
    {
        
$dusermail = auth()->user()->id;
$coach=Coach::where('user_id',$dusermail  )->first();
$coach->phrase= $request['txtphrase'];
$coach->save(); 
return redirect()->back();    
    }

}
