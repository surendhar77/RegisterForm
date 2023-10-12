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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[App\Http\Controllers\HomeController::class,'index'])->name('users');
Route::get('show/{id}',[App\Http\Controllers\HomeController::class,'show'])->name('users.show');
Route::get('edit/{id}',[App\Http\Controllers\HomeController::class,'edit'])->name('users.edit');
Route::put('update/{id}',[App\Http\Controllers\HomeController::class,'update'])->name('users.update');
Route::delete('delete/{id}',[App\Http\Controllers\HomeController::class,'delete'])->name('users.delete');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'home'])->name('home');
