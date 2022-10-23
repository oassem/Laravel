<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\CommentsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//posts
Route::get('/posts', [PostsController::class, 'index'])->name('posts.index');
Route::post('/posts', [PostsController::class, 'store'])->name('posts.store');
Route::get('/posts/create', [PostsController::class, 'create'])->name('posts.create');
Route::get('/posts/{post}', [PostsController::class, 'show'])->name('posts.show');
Route::get('/posts/{post}/edit', [PostsController::class, 'edit'])->name('posts.edit');
Route::put('/posts/{post}', [PostsController::class, 'update'])->name('posts.update');
Route::delete('/posts/{post}', [PostsController::class, 'destroy'])->name('posts.destroy');

//comments
Route::post('/comments', [CommentsController::class, 'store'])->name('comments.store');
Route::get('/comments', [CommentsController::class, 'index'])->name('comments.index');
Route::get('/comments/{comment}/edit', [CommentsController::class, 'edit'])->name('comments.edit');
Route::put('/comments/{comment}', [CommentsController::class, 'update'])->name('comments.update');
Route::delete('/comments/{comment}', [CommentsController::class, 'destroy'])->name('comments.destroy');

//restore
Route::get('/restore', [PostsController::class, 'restore'])->name('posts.restore');

//ajax
Route::get('/ajax/{id}', [PostsController::class, 'ajax'])->name('posts.ajax');