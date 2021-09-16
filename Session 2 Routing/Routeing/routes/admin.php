<?php


use App\Http\Controllers\HiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Front\UsersController;
use App\Http\Controllers\Admin\AdminController;
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
Route::get('test221', function () {
    return "test221";
});

/**
      RouteAdmin   لازم افصل 
      عن المستخدمين من شان اقسمن اول شي بنشىء ملف للراوت بعدا بروح على
      RouteServiceProvider بعدل فيه بضيف
          Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/admin.php'));
 */