<?php

namespace App\Filament\Pages;

use App\Models\Sale;
use Filament\Pages\Page;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\SalesExport;
use Barryvdh\DomPDF\Facade\Pdf;

class LaporanPenjualanPage extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationLabel = 'Laporan Penjualan (Export)';
    protected static ?string $navigationGroup = 'Laporan';
    protected static string $view = 'filament.pages.laporan-penjualan-page';
    protected static ?string $slug = 'laporan-penjualan-export';
    protected static bool $shouldRegisterNavigation = false;

    public $sales;

    public function mount()
    {
        $this->sales = Sale::with('kasir')->get();
    }

    public function exportToPDF()
    {
        $sales = Sale::with('kasir')->get();
        $pdf = Pdf::loadView('filament.pages.laporan-penjualan-pdf', compact('sales'));
        return $pdf->download('laporan_penjualan.pdf');
    }

    public function exportToExcel()
    {
        return Excel::download(new SalesExport, 'laporan_penjualan.xlsx');
    }
}
