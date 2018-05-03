<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class ClientController extends Controller
{
    private $user;

    public function __construct()
    {
        JWTAuth::parseToken();
        $this->user = JWTAuth::parseToken()->authenticate();
    }

    public function profile()
    {
        $this->user->client;
        $this->user->client->coach;
        return response()->json([
            'message' => 'Perfil de usuario cliente y su coach.',
            'data' => ['user' => $this->user]
        ], 200);
    }

    public function updateProfile(Request $request)
    {
        $this->user->name = $request->input('name');
        $this->user->lastname = $request->input('lastname');
        $this->user->gender = $request->input('gender');
        $this->user->phone = $request->input('phone');
        $this->user->save();

        return response()->json([
            'message' => 'Datos de perfil de usuario actualizado',
            'data' => ['user' => $this->user]
        ], 200);
    }
}
