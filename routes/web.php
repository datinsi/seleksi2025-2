<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\PembelianController;

Route::get('/', [PembelianController::class, 'index']);
Route::post('/pembelian', [PembelianController::class, 'store'])->name('pembelian.store');
