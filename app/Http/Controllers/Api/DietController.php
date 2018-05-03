<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Diet;

class DietController extends Controller
{
    private $user;

    public function __construct()
    {
        JWTAuth::parseToken();
        $this->user = JWTAuth::parseToken()->authenticate();
    }

    public function list()
    {
        $diets = Diet::where('client_id', $this->user->id)->get();
        return response()->json([
            'message' => 'Todas las dietas/recetas del usuario.',
            'data' => ['diets' => $diets]
        ], 200);
    }
}
