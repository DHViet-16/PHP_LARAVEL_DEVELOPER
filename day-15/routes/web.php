<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\CheckAge;
use App\Http\Middleware\CheckRegistrationAge;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    return 'Hello Laravel';
});

Route::get('/hello/{name}', function ($name) {
    return "Hello {$name}";
});

Route::get('/user/{id}', function (int $id) {
    return "User ID: {$id}";
});

Route::get('/hello-controller', [HelloController::class, 'index']);
Route::get('/hello/{name}', [HelloController::class, 'greet']);
Route::get('/api/hello', [HelloController::class, 'api']);

Route::get('/users', [UserController::class, 'index']);
Route::get('/profile', [UserController::class, 'profile']);

Route::get('/users/create', [UserController::class, 'create']);
Route::post('/users', [UserController::class, 'store'])->middleware(CheckRegistrationAge::class);

Route::get('/adult', function () {
    return 'Welcome to adult area';
})->middleware(CheckAge::class);
