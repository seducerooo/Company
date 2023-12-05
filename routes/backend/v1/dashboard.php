<?php

use App\Http\Controllers\v1\backend\DashboardController;
use App\Http\Controllers\v1\backend\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::controller(DashboardController::class)->group(function (){

    Route::get('/dashboard','Dashboard')->name('dashboard')->middleware('verified','auth');
    Route::get('/logout','logout')->name('logout');


});


Route::controller(ProfileController::class)->group(function (){
    Route::get('/user/profile','index')->name('user.profile')->middleware('auth');
    Route::post('/user/profile/store','store')->name('user.profile.store')->middleware('auth');
});
