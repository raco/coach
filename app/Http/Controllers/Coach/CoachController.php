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
        $dusermail = auth()->user()->id;
        $coaches = DB::table('coaches')
         ->select(DB::raw('coaches.phrase'))
         ->where('user_id','=',$dusermail )->first();

    	return view('coach.pages.dashboard', compact('coaches'));
    }

    public function clientList()
    {
    	$clients = Client::where('coach_id', auth()->user()->id)->get();
    	return view('coach.pages.clients', compact('clients'));
    }

    public function updphrase(Request $request)
    {
        $dusermail = auth()->user()->id;
        $coach = Coach::where('user_id',$dusermail  )->first();
        $coach->phrase= $request['txtphrase'];
        $coach->save();
        return redirect()->back();
    }

    public function uploadPhoto(Request $request)
    {
        $this->validate($request, [
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], [
            'photo.image' => "Error, el archivo debe ser una imagen.",
            'photo.mimes' => "Error, el archivo debe ser de tipo: jpeg, png, jpg, gif o svg",
        ]);

        $image = $request->file('photo');
        $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/uploads');
        $image->move($destinationPath, $input['imagename']);
        \Session::flash('flash_message', 'La foto ha sido cambiada correctamente.');
        $user = auth()->user();
        $user->image_url = url('uploads/'.$input['imagename']);
        $user->save();
        return redirect(route('coach.dashboard'));
    }
}
