<?php

use Illuminate\Support\Facades\Route;

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



Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/post/{post}', [App\Http\Controllers\PostController::class, 'show'])->name('post');

Route::middleware('auth')->group(function (){
   Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index');
   Route::get('/posts/create', [App\Http\Controllers\PostController::class, 'create'])->name('post.create');
   Route::get('/posts', [App\Http\Controllers\PostController::class, 'index'])->name('post.index');
   Route::post('/posts', [App\Http\Controllers\PostController::class, 'store'])->name('post.store');
   Route::delete('/posts/{post}/delete', [App\Http\Controllers\PostController::class, 'destroy'])->name('post.destroy');
   Route::get('/posts/{post}/edit', [App\Http\Controllers\PostController::class, 'edit'])->name('post.edit');
   Route::patch('/posts/{post}/update', [App\Http\Controllers\PostController::class, 'update'])->name('post.update');

   Route::get('/profile/{user}',[\App\Http\Controllers\UserController::class , 'show'])->name('user.profile.show');
   Route::patch('/profile/{user}/update',[\App\Http\Controllers\UserController::class , 'update'])->name('user.profile.update');

   Route::delete('/users/{user}/delete',[\App\Http\Controllers\UserController::class , 'destroy'])->name('user.destroy');




});

Route::middleware('role:admin')->group(function (){
    Route::get('/users',[\App\Http\Controllers\UserController::class , 'index'])->name('user.index');
});
