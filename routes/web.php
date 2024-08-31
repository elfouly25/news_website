<?php

use App\Http\Controllers\Admin\ForgetPasswordController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\LogoutController;
use App\Models\Post;

// Home route
Route::get('/', function () {
    $posts = Post::paginate(2);
    return view('home', ['posts' => $posts]);
})->name('home');

// Post routes
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/search', [PostController::class, 'search'])->name('posts.search'); // Corrected "route" to "Route"
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

// Section routes
Route::get('/sections', [SectionController::class, 'index'])->name('sections.index');
Route::get('/sections/create', [SectionController::class, 'create'])->name('sections.create');
Route::post('/sections', [SectionController::class, 'store'])->name('sections.store');
Route::get('/sections/{section}/edit', [SectionController::class, 'edit'])->name('sections.edit');
Route::put('/sections/{section}', [SectionController::class, 'update'])->name('sections.update');
Route::delete('/sections/{section}', [SectionController::class, 'destroy'])->name('sections.destroy');

// Admin routes
Route::get('/admin/login', [LoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [LoginController::class, 'login'])->name('admin.login.submit'); // Renamed to avoid conflict
Route::get('/admin/dashboard', [LoginController::class, 'showLoginSuccess'])->name('login.success');
Route::get('/password/forget', [ForgetPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/admin/logout', [LogoutController::class, 'logout'])->name('admin.logout');