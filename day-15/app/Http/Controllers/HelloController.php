<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{
    public function index(): string
    {
        return 'Hello from Controller';
    }
    // public function greet(string $name): string
    // {
    //     return "Hello {$name} from Controller";
    // }
    public function greet(Request $request, string $name): string
    {
        $age = $request->query('age');
        return "Hello {$name}, age: {$age}";
    }
    public function api(): \Illuminate\Http\JsonResponse
    {
        // return response()->json([
        //     'message' => 'Hello Laravel API',
        //     'status' => 'success',
        // ]);
        return response()->json([
            'message' => 'User created',
        ], 201);
    }
}
