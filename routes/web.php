<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MusicCategoryController;
use App\Http\Controllers\TrackController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
});

Route::post('register-user', [UserController::class, 'createUser']);

Route::post('authenticate', [LoginController::class, 'authenticate']);

Route::get('/logout', function () {
    Auth::logout();
    return redirect('/');
});

Route::get('/reset', function () {
    return view('auth.reset');
});

Route::get('/{search?}', [TrackController::class, 'listing']);

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('music/{category}{search?}', [TrackController::class, 'index']);

Route::get('music/{category}/{id}', [TrackController::class, 'show']);

Route::post('comments/store', [CommentController::class, 'store'])->middleware('auth')->name('comments.store');

Route::post('track/rate', [TrackController::class, 'rateTrack'])->middleware('auth');

// below are admin routes

Route::get('admin/login', function () {
    return view('admin.auth.login');
})->name('admin-login');

Route::post('admin/authenticate', [AdminController::class, 'authenticate']);

Route::get('admin', [AdminController::class, 'index'])->middleware('admin.auth');

Route::get('admin/logout', function () {
    Auth::logout();
    return redirect('admin/login');
});

Route::get('admin/music-category', [MusicCategoryController::class, 'index'])->middleware('admin.auth');

Route::get('admin/music-category-create', [MusicCategoryController::class, 'musicCategoryModal'])->middleware('admin.auth');

Route::get('admin/music-category-edit/{id}', [MusicCategoryController::class, 'musicCategoryModal'])->middleware('admin.auth');

Route::delete('admin/music-category-destroy/{id}', [MusicCategoryController::class, 'destroy'])->middleware('admin.auth');

Route::post('admin/music-category-store', [MusicCategoryController::class, 'store'])->middleware('admin.auth');

Route::post('admin/music-category-store/{id}', [MusicCategoryController::class, 'store'])->middleware('admin.auth');


Route::get('admin/track', [TrackController::class, 'trackListing'])->middleware('admin.auth');

Route::get('admin/track-create', [TrackController::class, 'trackModal'])->middleware('admin.auth');

Route::get('admin/track-edit/{id}', [TrackController::class, 'trackModal'])->middleware('admin.auth');

Route::delete('admin/track-destroy/{id}', [TrackController::class, 'destroy'])->middleware('admin.auth');

Route::post('admin/track-store', [TrackController::class, 'store'])->middleware('admin.auth');

Route::post('admin/track-store/{id}', [TrackController::class, 'store'])->middleware('admin.auth');
