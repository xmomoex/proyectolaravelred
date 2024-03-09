<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsuarioController;
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

Route::get('/', function () {
    return view('welcome');
});


Route::resource('/usuarios', UsuarioController::class);


Route::view('/login', "login")->name('login');
Route::view('/registro', "register")->name('registro');
Route::view('/privada', "secret")->middleware('auth')->name('privada');


Route::post('/validar-registro', [LoginController::class, 'register'])->name('validar-registro');

Route::post('/inicia-sesion', [LoginController::class, 'login'])->name('inicio-sesion');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
