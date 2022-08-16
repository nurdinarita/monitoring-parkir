<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DosenController;
use App\Http\Controllers\Admin\MahasiswaController;
use App\Http\Controllers\Admin\HistoryController;

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



Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [DashboardController::class, 'index']);
    Route::resource('/users/dosen', DosenController::class);
    Route::resource('/users/mahasiswa', MahasiswaController::class);
    Route::get('history/masuk', [HistoryController::class, 'masuk']);
    Route::get('history/keluar', [HistoryController::class, 'keluar']);
});