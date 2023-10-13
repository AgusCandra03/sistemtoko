<?php

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/barang', [App\Http\Controllers\BarangController::class, 'index']);
Route::get('/barang/create', [App\Http\Controllers\BarangController::class, 'create']);
Route::post('/barang', [App\Http\Controllers\BarangController::class, 'store']);
Route::get('/barang/{barang}/edit', [App\Http\Controllers\BarangController::class, 'edit']);
Route::put('/barang/{barang}', [App\Http\Controllers\BarangController::class, 'update']);
Route::delete('/barang/{barang}', [App\Http\Controllers\BarangController::class, 'destroy']);

Route::resource('/product', App\Http\Controllers\ProductController::class);