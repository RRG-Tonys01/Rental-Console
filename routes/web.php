<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ConsoleController;

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

// Admin
Route::get('/admin', 'App\Http\Controllers\Pages@index')->name('index');
Route::post('/verify', 'App\Http\Controllers\Pages@verify');
Route::get('/admin/dashboard', 'App\Http\Controllers\Pages@home')->name('admin/dashboard');
Route::get('/admin/logout', 'App\Http\Controllers\Pages@logout');
Route::get('/dashboard/product', 'App\Http\Controllers\Pages@product')->name('product');
Route::post('/dashboard/product/tambah', 'App\Http\Controllers\Pages@add');
Route::get('/dashboard/product/delete/{id}','App\Http\Controllers\Pages@delete');
Route::get('/dashboard/product/editview/{id}','App\Http\Controllers\Pages@editview');
Route::post('/dashboard/product/edit/{id}','App\Http\Controllers\Pages@edit');

//Customer
Route::redirect('/','home');

Route::get('/home', [HomeController::class, 'show'])->name('home');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('admin.dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/cart', function () {
    return view('cart');
})->name('cart');

// Route::get('/redirects','App\Http\Controllers\HomeController@redirect');
Route::get('/redirects', [HomeController::class, 'redirect']);

Route::get('/home/detail/{id}', [ConsoleController::class, 'detail'])->name('detail');

Route::get('/add-to-cart/{id}', [ConsoleController::class, 'addToCart'] )->name('cart');

Route::get('Console','App\Http\Controllers\ConsoleController@show')->name('Console');
// Route::get('/detail/{id}', 'App\Http\Controllers\ConsoleController@detail')->name('detail');

Route::get('Game','App\Http\Controllers\GameController@show')->name('Game');

// Route::get('/detail/{id}', 'detail');
Route::view('/detail', 'detail')->name('detail');

Route::get('/showCart', 'App\Http\Controllers\ConsoleController@showCart')->name('cart');
Route::post('/checkout/{id}', 'App\Http\Controllers\ConsoleController@checkout');
Route::get('/OrderList', 'App\Http\Controllers\ConsoleController@showDetail')->name('OrderList');
Route::get('/showCart/delete/{id}','App\Http\Controllers\ConsoleController@deleteCart');

// Route::view('/cart', 'cart')->name('cart');
