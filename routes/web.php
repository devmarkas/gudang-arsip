<?php

use App\Http\Controllers\ArsipController;
use App\Http\Controllers\HomeController;
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
    return view('auth.login');
});

Route::get('/test', function () {
    return view('test');
});

Route::get('/test1', function () {
    return view('test1');
});

Route::get('/dashboard', function () {
    return view('admin.dashboard.index');
});


Route::get('/tag-mitra', function () {
    return view('admin.kelola-arsip.tag-mitra.index');
});
Auth::routes();

//Dashboard Route
Route::get('/home', [HomeController::class, 'index'])->name('home');

//Arsip Route
Route::get('/impress-fund', [ArsipController::class, 'impress_fund'])->name('impress_fund.index');
Route::get('/impress-fund/{id}', [ArsipController::class, 'impress_fund_detail'])->name('impress_fund.detail');
Route::get('/out-archive/{id}', [ArsipController::class, 'out_archive'])->name('archive.out');
Route::get('/history-archive/{id}', [ArsipController::class, 'archive_history'])->name('archive.history');
Route::post('/impress-fund', [ArsipController::class, 'save_impress_fund'])->name('impress_fund.save');
Route::post('/archive-save/', [ArsipController::class, 'archive_save'])->name('archive_save.save');
Route::get('/take-out-archive/{id}', [ArsipController::class, 'take_out_archive'])->name('archive.take_out');
Route::get('/delete-impress-archive/{id}', [ArsipController::class, 'delete_impress'])->name('archive.take_out');




