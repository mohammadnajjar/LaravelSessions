<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VideoController;
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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('posts',[PostController::class,"index"]);
Route::get('users',[UserController::class,"index"]);
Route::get('image',[ImageController::class,"index"]);
Route::get('video',[VideoController::class,"index"]);
Route::get('comments',[CommentController::class,"index"]);
Route::get('tags',[TagController::class,"index"]);
