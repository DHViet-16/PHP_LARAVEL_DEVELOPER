<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;

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
    public function store(StoreUserRequest $request)
    {
        $validated = $request->validated();
        return "Name: {$validated['name']} \n Email: {$validated['email']} \n Age: {$validated['age']}";
    }
}
