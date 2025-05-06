<?php

namespace App\Filament\Resources;

use App\Models\Sale;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Forms;
use App\Filament\Resources\LaporanKasirResource\Pages;
use Filament\Tables\Actions\Action;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\SalesExport;
use Barryvdh\DomPDF\Facade\Pdf;

class LaporanKasirResource extends Resource
{
    protected static ?string $model = Sale::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationLabel = 'Laporan Kasir';
    protected static ?string $navigationGroup = 'Laporan';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListLaporanKasirs::route('/'),
        ];
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('ID'),

                Tables\Columns\TextColumn::make('total_price')
                    ->label('Total Harga')
                    ->money('IDR'),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Tanggal')
                    ->dateTime('d M Y H:i'),
            ])
            ->actions([
                Action::make('export_excel')
                    ->label('Export ke Excel')
                    ->action(function () {
                        return Excel::download(new SalesExport, 'laporan_kasir.xlsx');
                    }),

                Action::make('export_pdf')
                    ->label('Export ke PDF')
                    ->action(function () {
                        $sales = Sale::all();
                        $pdf = Pdf::loadView('filament.pages.laporan-kasir-pdf', compact('sales'));
                        return $pdf->download('laporan_kasir.pdf');
                    }),

                Action::make('print')
                    ->label('Cetak Laporan')
                    ->url(route('laporan.kasir.print'))
                    ->openUrlInNewTab(),
            ]);
    }

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                // Optional: bisa isi filter data di sini kalau mau
            ]);
    }
}
