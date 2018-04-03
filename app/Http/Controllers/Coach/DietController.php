<?php

namespace App\Http\Controllers\Coach;

use App\Diet;
use App\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DietController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $diets = Diet::where('coach_id', auth()->user()->coach->id)->get();
        
        return view('coach.pages.diets.index', compact('diets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients = Client::where('coach_id', auth()->user()->id)->get();
        return view('coach.pages.diets.create', compact('clients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $content = $request->input('content');
        $dom = new \DomDocument();
        $dom->loadHtml($content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);    
        $images = $dom->getElementsByTagName('img');
        foreach($images as $k => $img){
            $data = $img->getAttribute('src');
            list($type, $data) = explode(';', $data);
            list(, $data)      = explode(',', $data);
            $data = base64_decode($data);
            $image_name= "/uploads/" . time().$k.'.png';
            $path = public_path() . $image_name;
            file_put_contents($path, $data);
            $img->removeAttribute('src');
            $img->setAttribute('src', url($image_name));
        }
        $content = $dom->saveHTML();

        $diet = new Diet();
        $diet->category = $request->input('category');
        $diet->content = $content;
        $diet->coach_id = auth()->user()->coach->id;
        $diet->client_id = $request->input('client_id');
        $diet->save();

        \Session::flash('flash_message','La dieta ha sido creada.');
		return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Diet  $diet
     * @return \Illuminate\Http\Response
     */
    public function edit(Diet $diet)
    {
        $clients = Client::where('coach_id', auth()->user()->id)->get();
        return view('coach.pages.diets.edit', compact('diet', 'clients'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Diet  $diet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Diet $diet)
    {
        $content = $request->input('content');
        $dom = new \DomDocument();
        $dom->loadHtml($content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);    
        $images = $dom->getElementsByTagName('img');
        foreach($images as $k => $img){
            $data = $img->getAttribute('src');
            if(strpos($data, config('app.url')) === false) {
                list($type, $data) = explode(';', $data);
                list(, $data)      = explode(',', $data);
                $data = base64_decode($data);
                $image_name= "/uploads/" . time().$k.'.png';
                $path = public_path() . $image_name;
                file_put_contents($path, $data);
                $img->removeAttribute('src');
                $img->setAttribute('src', url($image_name));
            }
        }
        $content = $dom->saveHTML();

        $diet->category = $request->input('category');
        $diet->content = $content;
        $diet->client_id = $request->input('client_id');
        $diet->save();

        \Session::flash('flash_message', 'La dieta ha sido actualizada.');
		return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Diet  $diet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Diet $diet)
    {
        $diet->delete();
        \Session::flash('flash_message', 'La dieta ha sido eliminada.');
		return redirect()->back();
    }
}
