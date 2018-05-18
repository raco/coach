<?php

namespace App\Http\Controllers\Api;

use App\Message;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class MessagesController extends Controller
{
    private $user;

    public function __construct()
    {
        JWTAuth::parseToken();
        $this->user = JWTAuth::parseToken()->authenticate();
    }

    public function list()
    {
        $messages = Message::where('from_id', $this->user->id)->orWhere('to_id', $this->user->id)->get();

        return response()->json([
            'message' => 'Todos los mensajes del cliente',
            'data' => ['messages' => $messages]
        ], 200);
    }

    public function send(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'product_id' => 'integer',
                'from_id' => 'required|integer',
                'from_name' => 'required|string|max:55',
                'from_rol' => 'required|string|max:55',
                'to_id' => 'required|integer',
                'to_name' => 'required|string|max:55',
                'to_rol' => 'required|string|max:55',
                'message' => 'required|string|max:255|min:1',
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Datos enviados no válidos.',
                'data' => ['errors' => $validator->errors()]
            ], 422);
        }

        $message = Message::create($request->all());

        return response()->json([
            'message' => 'El mensaje fue creado exitosamente.',
            'data' => ['message' => $message]
        ], 200);
    }

    public function seen(Message $message)
    {
        $message->seen = true;
        $message->save();

        return response()->json([
            'message' => 'El receptor ha leído el mensaje.',
            'data' => ['message' => $message]
        ], 200);
    }
}
