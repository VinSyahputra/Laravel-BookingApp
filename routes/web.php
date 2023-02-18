<?php

use App\Http\Controllers\DataController;
use App\Models\Data;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;

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

// INDEX ROUTE
Route::get('/', function () {
    return view('home');
});

// DASHBOARD
Route::get('/dashboard', [DataController::class, 'index'])->middleware('auth');

Route::get('/rooms/checkSlug', [RoomController::class, 'checkSlug'])->middleware('admin');

// DATA ROUTE
Route::get('/data/{room:slug}', [DataController::class, 'show']);
Route::get('/data/{room:slug}/create', [DataController::class, 'create']);
Route::post('/data/{room:slug}', [DataController::class, 'store']);

// RESOURCES ROUTE
Route::resource('/data', DataController::class);
Route::resource('/rooms', RoomController::class);
Route::resource('/users', UserController::class)->middleware('admin');

// AUTH ROUTE
Route::get('/login', function () {
    return view('auth.login');
})->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login');
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', function () {
    return view('auth.register');
})->middleware('guest');
Route::post('/register', [LoginController::class, 'store']);


// TESTING
Route::get('/test', function(){
    return view('test', [
        'data' => Data::with(['user', 'room'])->get(),
        'rooms' => Room::all(),
    ]);
});

Route::fallback(function(){
    return view('404');
});

