<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PageController;

//functionality
use App\Http\Controllers\User\HomeController as UserPostController;
use App\Http\Controllers\Admin\PostController as AdminPostController;

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
    return view('home');
});

Auth::routes();

Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//role homepages
Route::get('admin/home', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('admin.home');
Route::get('user/home', [App\Http\Controllers\User\HomeController::class, 'index'])->name('user.home');

//page control
Route::get('/welcome', [PageController::class, 'welcome'])->name('welcome');
Route::get('/about', [PageController::class, 'about'])->name('about');

//functionality
Route::get('/user/posts', [UserPostController::class, 'index'])->name('user.posts.index');
Route::get('/user/posts/{id}', [UserPostController::class, 'show'])->name('user.posts.show');
Route::get('/user/posts/create', [UserPostController::class, 'create'])->name('user.posts.create');
Route::post('/user/posts/store', [UserPostController::class, 'store'])->name('user.posts.store');


Route::get('/admin/posts', [AdminPostController::class, 'index'])->name('admin.posts.index');
Route::get('/admin/posts/create', [AdminPostController::class, 'create'])->name('admin.posts.create');
Route::get('/admin/posts/{id}', [AdminPostController::class, 'show'])->name('admin.posts.show');
Route::post('/admin/posts/store', [AdminPostController::class, 'store'])->name('admin.posts.store');
Route::delete('/admin/posts/{id}', [AdminPostController::class, 'destroy'])->name('admin.posts.destroy');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
