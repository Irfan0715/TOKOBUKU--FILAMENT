<?php

use Illuminate\Support\Facades\Route;
use App\Models\Book; 
use App\Http\Controllers\LaporanKasirController;
use App\Http\Controllers\LaporanPenjualanController;

Route::get('/', function () {
    $books = Book::all();  // Ambil data dari model
    return view('landing', compact('books'));  // Kirim data ke view
});

// Laporan Kasir
Route::get('/laporan-kasir/print', [LaporanKasirController::class, 'print'])->name('laporan.kasir.print');
Route::get('/laporan-kasir/export-excel', [LaporanKasirController::class, 'exportExcel'])->name('laporan.kasir.excel');
Route::get('/laporan-kasir/export-pdf', [LaporanKasirController::class, 'exportPdf'])->name('laporan.kasir.pdf');

// Laporan Penjualan
Route::get('/laporan-penjualan/print', [LaporanPenjualanController::class, 'print'])->name('laporan.penjualan.print');
Route::get('/laporan-penjualan/export-excel', [LaporanPenjualanController::class, 'exportExcel'])->name('laporan.penjualan.excel');
Route::get('/laporan-penjualan/export-pdf', [LaporanPenjualanController::class, 'exportPdf'])->name('laporan.penjualan.pdf');


