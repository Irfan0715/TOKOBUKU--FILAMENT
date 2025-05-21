<?php

use Illuminate\Support\Facades\Route;
use App\Models\Book; 
use App\Http\Controllers\LaporanPenjualanController;

Route::get('/', function () {
    $books = Book::all();  // Ambil data dari model
    return view('landing', compact('books'));  // Kirim data ke view
});

Route::get('/project', function () {
    $books = \App\Models\Book::all();
    return view('project', compact('books'));
});

// Laporan Penjualan
Route::get('/laporan-penjualan/print', [LaporanPenjualanController::class, 'print'])->name('laporan.penjualan.print');
Route::get('/laporan-penjualan/export-excel', [LaporanPenjualanController::class, 'exportExcel'])->name('laporan.penjualan.excel');
Route::get('/laporan-penjualan/export-pdf', [LaporanPenjualanController::class, 'exportPdf'])->name('laporan.penjualan.pdf');


