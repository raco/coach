<?php

namespace App\Http\Controllers\Coach;

use App\Buyingrequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BuyingrequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $buyingrequests = Buyingrequest::with('user')->with('product')->with('coach')->where('coach_id', auth()->user()->coach->id)->get();
        return view('coach.pages.buyingrequests.index', compact('buyingrequests'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Buyingrequest  $buyingrequest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Buyingrequest $buyingrequest)
    {
        $buyingrequest->state = !$buyingrequest->state;
        $buyingrequest->save();
        
        \Session::flash('flash_message', 'La peticion a sido entregada.');
		return redirect()->back();
    }
}
