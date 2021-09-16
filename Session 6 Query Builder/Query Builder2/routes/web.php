<?php



use App\Http\Controllers\UserController;
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
// Get all users
Route::get('/', [UserController::class,"index"]);
//  insert users
Route::get('insert', [UserController::class,"insert"]);
//  update users
Route::get('update', [UserController::class,"update"]);
//  delete users
Route::get('delete', [UserController::class,"delete"]);
