<?php

use App\Http\Controllers\ArsipController;
use App\Http\Controllers\BillingController;
use App\Http\Controllers\BoxController;
use App\Http\Controllers\CommerceController;
use App\Http\Controllers\ConstructionController;
use App\Http\Controllers\HcmController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PartnerController;
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

Route::get('/print/{query}', [HomeController::class, 'print'])->name('print');
Route::get('/print_single/{query}', [HomeController::class, 'print_single'])->name('print_single');
Route::POST('/print_all_if', [HomeController::class, 'print_massal_if'])->name('print_massal_if');
Route::POST('/print_all_tm', [HomeController::class, 'print_massal_tm'])->name('print_massal_tm');
Auth::routes();

//Dashboard Route
Route::get('/', [HomeController::class, 'index'])->name('home');

//Impress Fund Arsip Route
Route::get('/impress-fund', [ArsipController::class, 'impress_fund'])->name('impress_fund.index');
Route::get('/impress-fund/{id}', [ArsipController::class, 'impress_fund_detail'])->name('impress_fund.detail');
Route::get('/qrcode-impress-fund/{id}', [ArsipController::class, 'detail'])->name('impress_fund.detail_qrcode');
Route::get('/out-archive/{id}', [ArsipController::class, 'out_archive'])->name('archive.out');
Route::get('/scan-if-archive/{id}', [ArsipController::class, 'out_archive']);
Route::get('/history-archive/{id}', [ArsipController::class, 'archive_history'])->name('archive.history');
Route::post('/impress-fund', [ArsipController::class, 'save_impress_fund'])->name('impress_fund.save');
Route::post('/archive-save/', [ArsipController::class, 'archive_save'])->name('archive_save.save');
Route::get('/take-out-archive/{id}', [ArsipController::class, 'take_out_archive'])->name('archive.take_out');
Route::get('/delete-impress-archive/{id}', [ArsipController::class, 'delete_impress'])->name('archive.take_out');
Route::post('/filter-impress-fund', [ArsipController::class, 'filter_impress_fund'])->name('impress_fund.filter');
Route::post('/import-impress-fund', [ArsipController::class, 'import_impress_fund'])->name('impress_fund.import');
Route::get('/cari-impress-fund/{id}', [ArsipController::class, 'cari_impress_fund'])->name('impress_fund.cari');

//Tag Mitra Arsip Route
Route::get('/tag-mitra', [PartnerController::class, 'index'])->name('tag_mitra.index');
Route::post('/tag-mitra', [PartnerController::class, 'save'])->name('tag_mitra.save');
Route::get('/out-archive-partner/{id}', [PartnerController::class, 'out_archive']);
Route::get('/cari-tag-partner/{id}', [PartnerController::class, 'cari_tag_partner'])->name('tag_mitra.cari');
Route::post('/import_tag_partner', [PartnerController::class, 'import_tag_partner'])->name('tag_mitra.import');
Route::get('/scan-tm-archive/{id}', [PartnerController::class, 'out_archive']);
Route::get('/delete-partner-archive/{id}', [PartnerController::class, 'delete_partner'])->name('archive.take_out_partner');

//Route Construction
Route::get('/construction', [ConstructionController::class, 'index'])->name('construction.index');

//Route BILLING COLLECTION
Route::get('/billing-collection', [BillingController::class, 'index'])->name('billing.index');

//Route Commerce
Route::get('/commerce', [CommerceController::class, 'index'])->name('commerce.index');

//Route HCM
Route::get('/hcm', [HcmController::class, 'index'])->name('hcm.index');

//Manajemen Box
Route::get('/box', [BoxController::class, 'index'])->name('box.index');
Route::get('/box-detail/{id}', [BoxController::class, 'show'])->name('box.detail');
Route::post('/box', [BoxController::class, 'store'])->name('box.store');
Route::post('/update-box/', [BoxController::class, 'update'])->name('box.update');
Route::get('/delete-box/{id}', [BoxController::class, 'destroy'])->name('box.delete');
