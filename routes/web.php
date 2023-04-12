<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\LoginController;
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
    return view('welcome');
});

Route::get('/reset', function () {
    return view('auth.reset');
});

Route::get('/', [TrackController::class, 'listing']);

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('music/{category}{search?}', [TrackController::class, 'index']);

Route::get('music/{category}/{id}', [TrackController::class, 'show']);

Route::post('comments/store', [CommentController::class, 'store'])->middleware('auth')->name('comments.store');
Route::post('track/rate', [TrackController::class, 'rateTrack']);
