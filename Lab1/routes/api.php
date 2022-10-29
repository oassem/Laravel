<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

// posts end points
Route::get('/posts', [PostsController::class, 'index_'])->middleware('auth:sanctum');
Route::post('/posts', [PostsController::class, 'store_'])->middleware('auth:sanctum');
Route::get('/posts/{post}', [PostsController::class, 'show_'])->middleware('auth:sanctum');

// sanctum authentication
Route::post('/sanctum/token', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);

    $user = User::where('email', $request->email)->first();

    if (!$user || !Hash::check($request->password, Hash::make($user->password))) {
        throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect.'],
        ]);
    }

    return $user->createToken($request->email)->plainTextToken;
});
