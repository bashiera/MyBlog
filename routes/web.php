<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use App\Models\Post;
use Faker\Provider\Lorem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|,
*/
//
//------------Routs with controller-----------------//
Route::get('/', [PagesController::class, 'index']);
Route::get('/contact', [PagesController::class, 'contact']);
Route::get('/create', [PostController::class, 'create'])->middleware('auth');
Route::post('/posts',  [PostController::class, 'store']);
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.showPost');
Route::get('/posts/edit/{post}', [PostController::class, 'edit'])->name('posts.edit')->middleware('auth');
Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy')->middleware('auth');

//Try resources Route
Route::resource('categories', CategoryController::class);
Route::resource('tags', TagController::class);
Route::get('/log', [AuthController::class, 'show'])->name('login')->middleware('guest');
Route::post('/log', [AuthController::class, 'auth']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
