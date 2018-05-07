<?php

namespace App\Http\Controllers\Api;

use App\Buyingrequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class BuyingrequestsController extends Controller
{
    private $user;

    public function __construct()
    {
        JWTAuth::parseToken();
        $this->user = JWTAuth::parseToken()->authenticate();
    }

    public function send(Request $request)
    {
        $validator = Validator::make(
            $request->all(), 
            [
                'product_id' => 'required|integer',
                'user_id' => 'required|integer', 
                'coach_id' => 'required|integer'
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Datos enviados no válidos.',
                'data' => ['errors' => $validator->errors()]
            ], 422);
        }
        

        $buyingrequest = Buyingrequest::create($request->all());

        return response()->json([
            'message' => 'La petición de compra ha sido enviada.',
            'data' => ['buyingrequest' => $buyingrequest]
        ], 200);
    }
}
