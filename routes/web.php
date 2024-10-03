<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArsipController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;

Route::get('/', function () {
    return redirect('/login');
});

Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');

    Route::get('/arsip', [ArsipController::class, 'index'])->name('arsip.index');
    Route::get('/arsip/search', [ArsipController::class, 'search'])->name('arsip.search');
    Route::get('/arsip/create', [ArsipController::class, 'create'])->name('arsip.create');
    Route::post('/arsip', [ArsipController::class, 'store'])->name('arsip.store');

    Route::get('/arsip/{id}/edit', [ArsipController::class, 'edit'])->name('arsip.edit');
    Route::put('/arsip/{id}', [ArsipController::class, 'update'])->name('arsip.update');
    Route::delete('/arsip/{id}', [ArsipController::class, 'destroy'])->name('arsip.destroy');
    Route::post('/peminjaman/{id}/return', [PeminjamanController::class, 'return'])->name('peminjaman.return');
    Route::get('/peminjaman/create/{arsip_id}', [PeminjamanController::class, 'create'])->name('peminjaman.create');


    Route::get('/laporan/peminjaman', [PeminjamanController::class, 'laporan'])->name('laporan.peminjaman');
    Route::get('/laporan/export', [PeminjamanController::class, 'exportPdf'])->name('laporan.export');
    Route::get('/peminjaman/laporan-pdf', [PeminjamanController::class, 'exportPdf'])->name('peminjaman.exportPdf');

    Route::resource('peminjaman', PeminjamanController::class);

});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/user', [UserController::class, 'index'])->name('user.dashboard');

    Route::get('/user/search', [UserController::class, 'search'])->name('user.search');
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');

});


Auth::routes();
