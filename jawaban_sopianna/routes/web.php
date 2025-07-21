<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

use App\Http\Controllers\PembelianController;

Route::post('/', [PembelianController::class, 'hitungPotonganHarga']);
