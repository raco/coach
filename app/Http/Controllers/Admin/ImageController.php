<?php

namespace App\Http\Controllers\Admin;

use App\Image;
use App\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $images = Image::all();
        return view('admin.pages.images.index', compact('images'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function edit(Image $image)
    {
        $clients = Client::with('user')->get();
        return view('admin.pages.images.edit', compact('image', 'clients'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Image $image)
    {
        $image->url = $request->hasFile('file') ? $this->storeImage($request->file('file')) : $image->url;
        $image->client_id = $request->input('client_id');
        $image->comment = $request->input('comment');
        $image->save();

        \Session::flash('flash_message','La imagen ha sido actualizada.');
		return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy(Image $image)
    {
        $image->delete();
        \Session::flash('flash_message','La imagen ha sido eliminada.');
		return redirect()->back();
    }
}
