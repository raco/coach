<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $posts = Post::all();
        return view('admin.pages.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.posts.create');
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
        $dom->encoding = 'utf-8';         
        $dom->loadHTML( utf8_decode( $content ) );    
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
        
        $post = new Post();
        $post->title = $request->input('title');
        $post->excerpt = $request->input('excerpt');
        $post->content = $content;
        $post->image = $this->storeImage($request->file('file'));
        $post->save();

        \Session::flash('flash_message','La noticia ha sido creada.');
		return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('admin.pages.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $content = $request->input('content');
        $dom = new \DomDocument();
        $dom->encoding = 'utf-8';         
        $dom->loadHTML( utf8_decode( $content ) );    
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

        $post->title = $request->input('title');
        $post->excerpt = $request->input('excerpt');
        $post->content = $content;
        $post->image = ($request->hasFile('file')) ? $this->storeImage($request->file('file')) : $post->image;
        $post->featured = $request->input('featured') ? true : false;
        $post->save();

        \Session::flash('flash_message','La noticia ha sido actualizada.');
		return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        \Session::flash('flash_message','La noticia ha sido eliminada.');
		return redirect()->back();
    }
}
