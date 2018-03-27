<?php

namespace App\Http\Controllers\Admin;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function list()
    {
        $products = Product::all();
        return view('admin.pages.products.index', compact('products'));
    }

    public function create()
    {
        return view('admin.pages.products.create');
    }

    public function store(Request $request)
    {
        unset($request['_token']);
        $request['image'] = $this->storeImage($request->file('file'));
        $product = Product::create($request->all());

        \Session::flash('flash_message','El producto '.$product->name.' ha sido creado.');
		return redirect()->back();
    }

    public function edit(Product $product)
    {
		return view('admin.pages.products.edit',compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $product->name = $request->input('name');
        $product->category = $request->input('category');
        $product->description = $request->input('description');
        if ($request->hasFile('file')) {
            $product->image = $this->storeImage($request->file('file'));
        }
        $product->save();

        \Session::flash('flash_message','El producto '.$product->name.' ha sido actualizado.');
		return redirect()->back();
    }

    public function destroy(Product $product)
    {
        $product->delete();
        \Session::flash('flash_message','El producto ha sido eliminado.');
		return redirect()->back();
    }
}
