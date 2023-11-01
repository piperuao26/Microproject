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



Route::get('/', 'App\Http\Controllers\HomeController@index')->name("home.index");
Route::get('/computers', 'App\Http\Controllers\ComputerController@index')->name("computer.index");
Route::get('/computers/create', 'App\Http\Controllers\ComputerController@create')->name("computer.create");
Route::post('/computers/save', 'App\Http\Controllers\ComputerController@save')->name("computer.save");
Route::get('/computers/{id}', 'App\Http\Controllers\ComputerController@show')->name("computer.show");
Route::get('/cart', 'App\Http\Controllers\CartController@index')->name("cart.index");
Route::get('/cart/delete', 'App\Http\Controllers\CartController@delete')->name("cart.delete");
Route::post('/cart/add/{id}', 'App\Http\Controllers\CartController@add')->name("cart.add"); 
    
Route::middleware('auth')->group(function () {
    Route::get('/cart/purchase', 'App\Http\Controllers\CartController@purchase')->name("cart.purchase");
   }); 


Auth::routes();

