<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\postscontroller;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Services\Newsletter;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;

Route::post('newsletter', function(Newsletter $newsletter){

    request()->validate([
       'email' => 'required|email'
    ]);

    try {
        $newsletter->subscribe(request('email'));
    } catch(Exception $e){

        throw ValidationException::withMessages([
            'email' => 'This email is not real bruh!'
        ]);
    }
    return redirect('/')->with('success', 'Signed up to the newsletters successful.');
});


Route::get('/', [postcontroller::class, 'index'])->name('home');

//                                                          Post
Route::get('posts/{post}', [postcontroller::class, 'show']);
Route::post('posts/{post}/comments',[CommentController::class, 'store']);

//                                                         Register
Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

//                                                         Sessions
Route::get('login',[SessionController::class, 'create'])->middleware('guest');
Route::Post('login',[SessionController::class, 'store'])->middleware('guest');
Route::post('logout',[SessionController::class, 'destroy'])->middleware('auth');


