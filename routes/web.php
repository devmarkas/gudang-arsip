<?php

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

Route::get('/test', function () {
    return view('test');
});

Route::get('/test1', function () {
    return view('test1');
});

Route::get('/dashboard', function () {
    return view('admin.dashboard.index');
});

Route::get('/impress-fund', function () {
    return view('admin.kelola-arsip.impress-fund.index');
});

Route::get('/tag-mitra', function () {
    return view('admin.kelola-arsip.tag-mitra.index');
});