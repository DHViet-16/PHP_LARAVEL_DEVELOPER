<?php

namespace App\Http\Controllers;

use Illuminate\Http\Middleware;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $name = 'Viet';
        $age = 25;

        $skills = [
            'PHP',
            'Laravel',
            'MySQL',
        ];

        return view('users.index', [
            'name' => $name,
            'age' => $age,
            'skills' => $skills,
        ]);
    }
    public function profile()
    {
        $name = 'Viet';
        $age = 25;

        return view('users.profile', [
            'name' => $name,
            'age' => $age,
        ]);
    }
    public function create()
    {
        return view('users.create');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|min:2|max:100',
            'email' => 'required|string|email|max:255',
            'age' => 'required|integer|min:18|max:100',
        ]);
        return "Name: {$validated['name']} \n Email: {$validated['email']} \n Age: {$validated['age']}";
    }
}
