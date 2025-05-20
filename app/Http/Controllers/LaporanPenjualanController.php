<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Illuminate\Http\Request;
use App\Exports\SalesExport;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;

class LaporanPenjualanController extends Controller
{
    public function print()
    {
        // Kalau ingin relasi user, ganti 'kasir' jadi 'user'
        $sales = Sale::with('user')->get();

        return view('filament.pages.laporan-penjualan-pdf', compact('sales'));
    }

    public function exportExcel()
    {
        return Excel::download(new SalesExport, 'laporan_penjualan.xlsx');
    }

    public function exportPdf()
    {
        $sales = Sale::with('user')->get();

        $pdf = Pdf::loadView('filament.pages.laporan-penjualan-pdf', compact('sales'));
        return $pdf->download('laporan_penjualan.pdf');
    }
}
