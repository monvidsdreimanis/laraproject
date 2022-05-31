<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Models\Post;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/hello', function () {
    return view('hello');
});
Route::get('/page', function () {
    return view('page', ['name' => 'Monvīds']);
});
Route::get('/greetings', function () {
    return view('greetings');;
});
Route::get('/posts', function () {
    $posts = Post::get();
    dd($posts);
});

Route::controller(PostController::class)->group(function () {
    Route::prefix('posts')->group(function () {
        Route::get('/', 'index')->name('posts.index');
        Route::get('/create', 'create')->name('posts.create');;
        Route::post('/create', 'store')->name('posts.store');
        //Route::get('/show/{id}', 'show')->name('posts.show');
        Route::get('/show/{post}', 'show')->name('posts.show');
        Route::get('/edit/{post}', 'edit')->name('posts.edit');;
        Route::post('/edit/{post}', 'update')->name('posts.update');
        Route::get('/destroy/{post}', 'destroy')->name('posts.destroy');
    });
});

Route::controller(CommentController::class)->group(function () {
    Route::prefix('comments')->group(function () {
        Route::post('/store', 'store')->name('comments.store');
    });
});