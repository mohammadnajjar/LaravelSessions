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
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ], function () {
    /** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/
    Route::group(['prefix' => 'offers'], function () {
//        Route::get('/', [CrudController::class, 'getOffers']);
        Route::get('/', [CrudController::class, 'index']);
        Route::get('/create', [CrudController::class, 'create']);
        Route::post('/store', [CrudController::class, 'store'])->name('Crudstore');
        Route::get('edit/{offer_id}', [CrudController::class, 'edit'])->name('offers.edit');
        Route::post('update/{offer_id}', [CrudController::class, 'update'])->name('offers.update');
    });
});
require __DIR__ . '/auth.php';
