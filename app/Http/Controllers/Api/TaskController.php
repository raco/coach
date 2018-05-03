<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Task;

class TaskController extends Controller
{
    private $user;

    public function __construct()
    {
        JWTAuth::parseToken();
        $this->user = JWTAuth::parseToken()->authenticate();
    }

    public function list()
    {
        $tasks = Task::where('client_id', $this->user->id)->get();
        return response()->json([
            'message' => 'Todas las tareas del cliente.',
            'data' => ['tasks' => $tasks]
        ], 200);
    }

    public function update(Task $task)
    {
        $task->done = !$task->done;
        $task->save();

        return response()->json([
            'message' => 'Tarea actualizada por el cliente.',
            'data' => ['task' => $task]
        ], 200);
    }
}
