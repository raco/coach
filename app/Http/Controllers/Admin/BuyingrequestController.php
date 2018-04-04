<?php

namespace App\Http\Controllers\Admin;

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
        $buyingrequests = Buyingrequest::with('user')->with('product')->with('coach')->get();
        return view('admin.pages.buyingrequests.index', compact('buyingrequests'));
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
        
        if (!$buyingrequest->state) {
            \Session::flash('flash_message', 'La petición está pendiente de entrega.');
        } else {
            \Session::flash('flash_message', 'La petición ha sido entregada.');
        }
		return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Buyingrequest  $buyingrequest
     * @return \Illuminate\Http\Response
     */
    public function destroy(Buyingrequest $buyingrequest)
    {
        
    }
}
