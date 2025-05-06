<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\SalesExport;
use Barryvdh\DomPDF\Facade\Pdf;

class LaporanKasirController extends Controller
{
    public function print()
    {
        $sales = Sale::all();
        return view('filament.pages.laporan-kasir-print', compact('sales'));
    }

    public function exportExcel()
    {
        return Excel::download(new SalesExport, 'laporan_kasir.xlsx');
    }

    public function exportPdf()
    {
        $sales = Sale::all();
        $pdf = Pdf::loadView('filament.pages.laporan-kasir-pdf', compact('sales'));
        return $pdf->download('laporan_kasir.pdf');
    }
}
