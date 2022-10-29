<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\CommentsController;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;

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
Route::get('/posts', [PostsController::class, 'index'])->name('posts.index')->middleware('auth');
Route::post('/posts', [PostsController::class, 'store'])->name('posts.store')->middleware('auth');
Route::get('/posts/create', [PostsController::class, 'create'])->name('posts.create')->middleware('auth');
Route::get('/posts/{post}', [PostsController::class, 'show'])->name('posts.show')->middleware('auth');
Route::get('/posts/{post}/edit', [PostsController::class, 'edit'])->name('posts.edit')->middleware('auth');
Route::put('/posts/{post}', [PostsController::class, 'update'])->name('posts.update')->middleware('auth');
Route::delete('/posts/{post}', [PostsController::class, 'destroy'])->name('posts.destroy')->middleware('auth');

//comments
Route::post('/comments', [CommentsController::class, 'store'])->name('comments.store');
Route::get('/comments', [CommentsController::class, 'index'])->name('comments.index');
Route::get('/comments/{comment}/edit', [CommentsController::class, 'edit'])->name('comments.edit');
Route::put('/comments/{comment}', [CommentsController::class, 'update'])->name('comments.update');
Route::delete('/comments/{comment}', [CommentsController::class, 'destroy'])->name('comments.destroy');

//restore
Route::get('/restore', [PostsController::class, 'restore'])->name('posts.restore');

//ajax
Route::get('/ajax/{id}', [PostsController::class, 'ajax'])->name('posts.ajax')->middleware('auth');

//auth
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', function () {
    return view('auth/login');
});

// socialite
Route::get('/auth/github', function () {
    return Socialite::driver('github')->redirect();
});

Route::get('/auth/github/callback', function () {
    try {

        $user = Socialite::driver('github')->user();

        $finduser = User::where('github_id', $user->id)->first();

        if ($finduser) {

            Auth::login($finduser);

            return redirect()->intended('posts');
        } else {
            $newUser = User::updateOrCreate(['email' => $user->email], [
                'name' => $user->name,
                'github_id' => $user->id,
                'password' => encrypt('12345')
            ]);

            Auth::login($newUser);

            return redirect()->intended('posts');
        }
    } catch (Exception $e) {
        dd($e->getMessage());
    }
});
