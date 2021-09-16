<?php

use App\Http\Controllers\UsersController;
use App\Http\Controllers\ProvisionServer;
use App\Http\Controllers\PhotoController;
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

// Basic Controllers
Route::get('/', [UsersController::class, 'index']);
// Single Action Controllers
Route::get('server', ProvisionServer::class);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('photos/hi', [PhotoController::class, 'hi']);
Route::resource('photos', PhotoController::class);