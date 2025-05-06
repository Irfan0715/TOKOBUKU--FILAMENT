<?php

namespace App\Filament\Pages;

use App\Models\User;
use Filament\Pages\Page;
use Filament\Tables;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\SalesExport;
use Barryvdh\DomPDF\Facade\Pdf;

class LaporanKasir extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $navigationLabel = 'Laporan Kasir';
    protected static ?string $navigationGroup = 'Laporan';
    protected static string $view = 'filament.pages.laporan-kasir';

    public $kasirs;

    public function mount()
    {
        // Ambil data kasir dengan jumlah transaksi dan total penjualan
        $this->kasirs = User::withCount('sales')->withSum('sales', 'total_price')->get();
    }

    public function getTableQuery()
    {
        // Query untuk mengambil data kasir dengan jumlah transaksi dan total penjualan
        return User::query()->withCount('sales')->withSum('sales', 'total_price');
    }

    public function table(Tables\Table $table)
    {
        return $table
            ->columns([
                Tables\Columns\Text::make('name')
                    ->label('Nama Kasir')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\Text::make('sales_count')
                    ->label('Jumlah Transaksi')
                    ->sortable(),
                Tables\Columns\Text::make('sales_sum_total_price')
                    ->label('Total Penjualan')
                    ->sortable()
                    ->money('IDR'),
            ]);
    }

    public function getTableActions()
    {
        return [
            Tables\Actions\Action::make('export_excel')
                ->label('Export ke Excel')
                ->action(fn () => Excel::download(new SalesExport, 'laporan_kasir.xlsx')),

            Tables\Actions\Action::make('export_pdf')
                ->label('Export ke PDF')
                ->action(fn () => $this->exportToPDF()),

            Tables\Actions\Action::make('print')
                ->label('Cetak Laporan')
                ->action(fn () => $this->printReport())
        ];
    }

    public function exportToPDF()
    {
        // Mendapatkan data kasir
        $kasirs = User::withCount('sales')->withSum('sales', 'total_price')->get();

        // Menggunakan DomPDF untuk merender PDF
        $pdf = Pdf::loadView('filament.pages.laporan-kasir-pdf', compact('kasirs'));

        // Mengunduh PDF
        return $pdf->download('laporan_kasir.pdf');
    }

    public function printReport()
    {
        // Ini bisa berisi logic untuk mencetak laporan menggunakan JavaScript
        return redirect()->route('laporan.kasir.print');
    }
}
