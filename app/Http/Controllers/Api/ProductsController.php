<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Product;

class ProductsController extends Controller
{
    private $user;

    public function __construct()
    {
        JWTAuth::parseToken();
        $this->user = JWTAuth::parseToken()->authenticate();
    }

    public function product(Product $product)
    {
        return response()->json([
            'message' => 'Datos del producto requerido.',
            'data' => ['product' => $product]
        ], 200);
    }

    public function list()
    {
        $products = Product::all('id', 'category', 'name', 'image', 'description');

        return response()->json([
            'message' => 'Todos los productos de la tienda.',
            'data' => ['products' => $products]
        ], 200);
    }
}
