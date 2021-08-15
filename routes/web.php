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
Route::get('/admin/stock',[AdminController::class,'stock'])->name('AdminStock');
Route::get('/admin/history',[AdminController::class,'history'])->name('AdminHistory');
Route::get('/admin/employee',[AdminController::class,'employee'])->name('AdminMember');
Route::get('/admin/member',[MemberController::class,'member'])->name('member');

Route::get('/admin/pushOrder',[AdminController::class,'pushOrder'])->name('PushOrder');
Route::get('/admin/deleteOrder',[AdminController::class,'deleteOrder'])->name('deleteOrder');
Route::get('/admin/cancelOrder',[AdminController::class,'cancelOrder'])->name('cancelOrder');
Route::get('/admin/successOrder',[AdminController::class,'successOrder'])->name('successOrder');


Route::get('/admin/deletehistory',[AdminController::class,'deletehistory'])->name('deletehistory');

Route::get('/admin/addstock',[AdminController::class,'addstock'])->name('addstock');
Route::get('/admin/updateStock',[AdminController::class,'updateStock'])->name('updateStock');
Route::get('/admin/deleteStocks',[AdminController::class,'deleteStock'])->name('deleteStock');
Route::get('/admin/addMenu',[AdminController::class,'addMenu'])->name('addMenu');
Route::get('/admin/deleteMenu',[AdminController::class,'deleteMenu'])->name('deleteMenu');



Route::get('/admin/addMember',[AdminController::class,'addMember'])->name('addMember');

Route::get('/admin/deleteMember',[AdminController::class,'deleteMember'])->name('deleteMember');

Route::get('/admin/editMember',[AdminController::class,'editMember'])->name('editMember');




Route::get('/member',[MemberController::class,'index'])->name('member');

Route::get('/member/history',[MemberController::class,'memberHistory'])->name('memberHistory');
Route::get('/member/memberMember',[MemberController::class,'memberMember'])->name('memberMember');
Route::get('/member/memberStock',[MemberController::class,'memberStock'])->name('memberStock');
Route::get('/member/pushOrderM',[MemberController::class,'PushOrderM'])->name('PushOrderM');
Route::get('/member/deleteOrderM',[MemberController::class,'deleteOrderM'])->name('deleteOrderM');
Route::get('/member/cancelOrderM',[MemberController::class,'cancelOrderM'])->name('cancelOrderM');
Route::get('/member/successOrderM',[MemberController::class,'successOrderM'])->name('successOrderM');

Route::get('/member/updateStockM',[MemberController::class,'updateStockM'])->name('updateStockM');