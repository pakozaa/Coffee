<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MemberController;

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

Route::get('/index',[IndexController::class,'index'])->name('index');
Route::get('/',[IndexController::class,'login'])->name('login');

Route::get('/admin',[AdminController::class,'index'])->name('admin');
Route::get('/stock',[AdminController::class,'stock'])->name('AdminStock');
Route::get('/history',[AdminController::class,'history'])->name('AdminHistory');
Route::get('/employee',[AdminController::class,'employee'])->name('AdminMember');
Route::get('/member',[MemberController::class,'index'])->name('member');

Route::get('/admin/pushOrder',[AdminController::class,'pushOrder'])->name('PushOrder');

Route::get('/admin/deleteOrder',[AdminController::class,'deleteOrder'])->name('deleteOrder');

Route::get('/admin/deletehistory',[AdminController::class,'deletehistory'])->name('deletehistory');
Route::get('/admin/cancelOrder',[AdminController::class,'cancelOrder'])->name('cancelOrder');

Route::get('/admin/successOrder',[AdminController::class,'successOrder'])->name('successOrder');


