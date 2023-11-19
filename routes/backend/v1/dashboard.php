<?php

use App\Http\Controllers\ProfileController;
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
Route::controller(\App\Http\Controllers\v1\backend\DashboardController::class)->group(function (){

    Route::get('/dashboard','Dashboard')->name('dashboard');
    Route::get('/logout','logout')->name('logout');


});
