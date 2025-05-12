<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LaporanKasirController;
use App\Http\Controllers\LaporanPenjualanController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function () {
    return redirect('index.html');
});

// Laporan Kasir
Route::get('/laporan-kasir/print', [LaporanKasirController::class, 'print'])->name('laporan.kasir.print');
Route::get('/laporan-kasir/export-excel', [LaporanKasirController::class, 'exportExcel'])->name('laporan.kasir.excel');
Route::get('/laporan-kasir/export-pdf', [LaporanKasirController::class, 'exportPdf'])->name('laporan.kasir.pdf');

// Laporan Penjualan
Route::get('/laporan-penjualan/print', [LaporanPenjualanController::class, 'print'])->name('laporan.penjualan.print');
Route::get('/laporan-penjualan/export-excel', [LaporanPenjualanController::class, 'exportExcel'])->name('laporan.penjualan.excel');
Route::get('/laporan-penjualan/export-pdf', [LaporanPenjualanController::class, 'exportPdf'])->name('laporan.penjualan.pdf');


