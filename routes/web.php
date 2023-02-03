<?php

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

Route::get('/', function () {
    return view('home');
});
Route::get('/dashboard', function () {
    return view('dashboard.index', [
        'data' => Data::with(['user', 'room'])->paginate(5)->onEachSide(1), //error ini bisa diakali dengan memindahkan return view ke controller
        'rooms' => Room::all(),
    ]);
})->middleware('auth');

Route::get('/room/{room:slug}', function($slug){
    $id = Room::select('id')->where('slug', $slug)->first();
    // return Data::where('room_id', $id->id)->get();
        return view('dashboard.room.show', [
            'rooms' => Room::all(),
            'data' => Data::where('room_id', $id->id)->get(),
        ]);
});

Route::resource('/rooms', RoomController::class);
Route::resource('/users', UserController::class)->middleware('admin');


Route::get('/login', function () {
    return view('auth.login');
})->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login');
Route::post('/logout', [LoginController::class, 'logout']);


Route::get('/register', function () {
    return view('auth.register');
})->middleware('guest');
Route::post('/register', [LoginController::class, 'store']);

Route::get('/test', function(){
    return view('test', [
        'data' => Data::with(['user', 'room'])->get(),
        'rooms' => Room::all(),
    ]);
});

Route::fallback(function(){
    return view('404');
});

