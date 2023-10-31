<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

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


Route::view('/login', "login")->name('login');
Route::view('/register', "register")->name('register');
Route::view('/private', "secret")->name('private');

Route::post('/validar-registro', [LoginController::class, 'register'])->name('validar-registro');
Route::post('/inicia-sesion', [LoginController::class, 'login'])->name('inicia-sesion');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/', 'App\Http\Controllers\HomeController@index')->name("home.index");
Route::get('/computers', 'App\Http\Controllers\ComputerController@index')->name("computer.index");
Route::get('/computers/create', 'App\Http\Controllers\ComputerController@create')->name("computer.create");
Route::post('/computers/save', 'App\Http\Controllers\ComputerController@save')->name("computer.save");
Route::get('/computers/{id}', 'App\Http\Controllers\ComputerController@show')->name("computer.show");
Route::get('/cart', 'App\Http\Controllers\CartController@index')->name("cart.index");
Route::post('/cart/add/{id}', 'App\Http\Controllers\CartController@add')->name('cart.add');
Route::get('/cart/removeAll/', 'App\Http\Controllers\CartController@removeAll')->name("cart.removeAll");



