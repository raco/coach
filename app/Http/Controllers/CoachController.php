<?php

namespace App\Http\Controllers;

use App\Coach;

use Illuminate\Http\Request;

class CoachController extends Controller
{ 

    public function list()
    {
        $coaches = Coach::with('user')->get(); 
        return view('admin.pages.coaches.list', compact('coaches'));
    }
}
