<?php

use App\Models\Students;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\ekstraController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\register;
use App\Http\Controllers\login;
use Illuminate\Support\Facades\Route;

// Auth
Route::get('/login', function () {
    return view('LoginIndex');
})->name('login')->middleware('guest');
Route::post('/login',[login::class, 'auth']);

Route::post('/logout',[login::class, 'logout']);
Route::get('/register', function () {
    return view('RegisterIndex');
})->middleware('guest');
Route::post('/register',[register::class, 'store']);

// Page Guest
Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', function () {
    return view('home', [
        "title" => "Home"
    ]);
});
Route::get('/about', function () {
    return view('about', [
        "title" => "About",
        "Nama" => "Fardan Athilla",
        "Kelas" => "11 PPLG 1",
        "Foto" => "image/gambar.jpg",

    ]);
});
Route::get('student', [StudentsController::class,'index2']); 
Route::resource('ekstra', ekstraController::class,);
Route::get('kelas', [KelasController::class,'index2']);
Route::get('student/detail/{student}', [StudentsController::class,'show2']);
Route::get('kelas/detail/{kelas}', [KelasController::class,'show2']);

// Page Admin
Route::get('/dashboard', [dashboardController::class, 'index'])->middleware('auth');
Route::resource('dashboard/student', StudentsController::class)->middleware('auth');
Route::resource('dashboard/ekstra', ekstraController::class)->middleware('auth');
Route::resource('dashboard/kelas', KelasController::class)->middleware('auth');