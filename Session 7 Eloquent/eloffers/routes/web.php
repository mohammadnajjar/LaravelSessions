<?php

use App\Http\Controllers\CrudController;
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

Auth::routes(['verify' => true]);

Route::get('/home', function () {
    return view('home');
})->middleware(['auth','verified'])->name('home');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'offers'],function (){
    Route::get('/', [CrudController::class, 'getOffers']);
//    Route::get('store', [CrudController::class, 'store']);
    Route::get('create', [CrudController::class, 'create']);
    Route::post('store', [CrudController::class, 'store']);

});

