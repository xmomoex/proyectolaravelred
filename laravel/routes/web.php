<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes(['verify' => true]);


Route::get('/', function () {
    return view('welcome');
});


Route::resource('/usuarios', UsuarioController::class);
Route::delete('/usuarios/{id}', 'UsuarioController@destroy')->name('usuario.destroy');

Route::resource('/posts', PostController::class);


Route::view('/login', "login")->name('login');
Route::view('/registro', "register")->name('registro');
Route::view('/privada', "secret")->middleware('auth')->name('privada');


Route::post('/validar-registro', [LoginController::class, 'register'])->name('validar-registro');
Route::post('/validar-registro', [RegisterController::class, 'create'])->name('validar-registro');
Route::post('/validar-registro', [RegisterController::class, 'create'])->name('validar-registro');

Route::post('/inicia-sesion', [LoginController::class, 'login'])->name('inicio-sesion');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
