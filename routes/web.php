<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes();


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('home/store', [App\Http\Controllers\HomeController::class, 'store'])->name('home.store');
// Route::get('/home/{value-id}/edit', ['as' => 'home.edit', 'uses' => 'HomeController@edit']);
Route::get('/home/{id}/edit', [App\Http\Controllers\HomeController::class, 'edit'])->name('home.edit');
// Route::post('home/update', [App\Http\Controllers\HomeController::class, 'update'])->name('home.update');
Route::post('home/update/{id}', [App\Http\Controllers\HomeController::class, 'update'])->name('home-update');
Route::get('/home/{id}', [App\Http\Controllers\HomeController::class, 'destroy'])->name('home.destroy');

Route::get('user_feeds', [App\Http\Controllers\UserController::class, 'index'])->name('user_feeds');
