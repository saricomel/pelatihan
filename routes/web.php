<?php

use App\Http\Controllers\dashbordcontroller;
use App\Http\Controllers\laporancontroller;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OmzetController;
use App\Http\Controllers\PembinaanController;
use App\Http\Controllers\UmkmController;
use App\Http\Controllers\UserController;
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
Route::get('/',[dashbordcontroller::class,'welcome'])
->middleware('auth');
Route::resource('umkm', UmkmController::class)->middleware('auth');
Route::resource('pembinaan', PembinaanController::class)->middleware('auth');
Route::resource('omzet', OmzetController::class)->middleware('auth');
route::resource('user', UserController::class)
    ->except('destroy','Create','show','update','edit')->middleware('auth');
    Route::get('/omzet/{id}/edit', [OmzetController::class, 'edit'])->name('omzet.edit');
    Route::get('login',[LoginController::class,'loginView'])->name('login');
    Route::post('login',[LoginController::class,'authenticate']);
    Route::post('logout',[LoginController::class,'logout'])->middleware('auth');
    Route::get('/laporan/pembinaan', [laporancontroller::class, 'laporanPembinaan'])->name('pembinaan.laporan');

