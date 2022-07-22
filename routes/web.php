<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AdminManagementController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use App\Http\Controllers\Admin\ResortManagementController;
use App\Http\Controllers\admin\ReservationManagementController;




Route::get('/',[FrontEndController::class,'index']);
Route::get('/resort/{id}',[FrontEndController::class,'view_single_resort']);
Route::get('/availability/{id}',[FrontEndController::class,'availability_form'])->name('availibility.form');
Route::post('/availabile/{id}',[FrontEndController::class,'check_availability'])->name('available.check');
Route::post('book-resort',[FrontEndController::class,'book_reosrt'])->name('book-resort-now');
Route::post('book-resort/{id}',[FrontEndController::class,'complete_booking'])->name('complete.booking');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin',[AdminController::class,'admin_login_form'])->name('admin.login.form');
Route::post('/admin-login',[AdminController::class,'admin_login'])->name('admin.login');

Route::group(['middleware'=>'admin'],function(){
    Route::get('/admin/dashboard',[DashboardController::class,'admin_dashboard'])->name('admin.dashboard');
    Route::get('/admin-logout',[AdminController::class,'admin_logout'])->name('admin.logout');
    Route::resource('admin-management',AdminManagementController::class);
    Route::resource('resort-management',ResortManagementController::class);
    Route::get('show-reservations',[ReservationManagementController::class,'index'])->name('admin.reservations');
    Route::get('check-out/{id}',[ReservationManagementController::class,'check_out'])->name('check.out');
    
    

});


