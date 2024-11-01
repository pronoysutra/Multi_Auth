<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\DashController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Auth;
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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//admin
Route::get('/admin_login', [AdminController::class, 'admin_loginform'])->name('admin.login');
// routes/web.php
Route::post('/admin_loginlog', [AdminController::class, 'admin_loginlog'])->name('admin.loginlog');


//admin
Route::group(['middleware'=>'admin'],function(){
    Route::get('/admin_dashboard', [DashController::class, 'admin_dashboard'])->name('admin.dashboard');

});
   
Route::post('/admin_logout', [App\Http\Controllers\Backend\AdminController::class, 'admin_logout'])->name('admin.logout');

