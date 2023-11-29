<?php

use App\Http\Controllers\AkunController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\KasirController;
use App\Http\Controllers\TenanController;
use App\Http\Controllers\NotaController;

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

Auth::routes();

Route::get('/etalaseBuku', [BukuController::class, 'etalaseBuku'])->name('etalaseBuku');

Route::group(['prefix' => 'dashboard/admin'], function () {
        Route::get('/', [HomeController::class, 'index'])->name('home');

        Route::group(['prefix' => 'profile'], function () {
            Route::get('/', [HomeController::class, 'profile'])->name('profile');
            Route::post('update', [HomeController::class, 'updateprofile'])->name('profile.update');
        });

        Route::controller(AkunController::class)
            ->prefix('akun')
            ->as('akun.')
            ->group(function () {
                Route::get('/', 'index')->name('index');
                Route::post('showdata', 'dataTable')->name('dataTable');
                Route::match(['get', 'post'], 'tambah', 'tambahAkun')->name('add');
                Route::match(['get', 'post'], '{id}/ubah', 'ubahAkun')->name('edit');
                Route::delete('{id}/hapus', 'hapusAkun')->name('delete');
            });

        
        
        Route::controller(BarangController::class)
            ->prefix('barang')
            ->as('barang.')
            ->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('/{KodeBarang}/detail', 'detail')->name('detail');
                Route::post('/dataTable', 'dataTable')->name('dataTable');
                Route::match(['get', 'post'], '/tambah', 'tambahBarang')->name('add');
                Route::match(['get', 'post'], '/{KodeBarang}/ubah', 'ubahBarang')->name('ubah');
                Route::delete('/{KodeBarang}/hapus', 'hapusBarang')->name('hapus');
            });

        Route::controller(KasirController::class)
            ->prefix('kasir')
            ->as('kasir.')
            ->group(function () {
                Route::get('/', 'index')->name('index');
            });

        Route::controller(TenanController::class)
            ->prefix('tenan')
            ->as('tenan.')
            ->group(function () {
                Route::get('/', 'index')->name('index');
            });

        Route::controller(NotaController::class)
            ->prefix('nota')
            ->as('nota.')
            ->group(function () {
                Route::match(['get', 'post'], '/tambah', 'tambahTransaksi')->name('add');
            });
});
