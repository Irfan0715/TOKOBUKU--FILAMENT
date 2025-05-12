<?php

namespace App\Filament\Resources;

use App\Models\Sale;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Forms;
use App\Exports\SalesExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Filament\Resources\LaporanPenjualanResource\Pages;
use Filament\Tables\Actions\Action;

class LaporanPenjualanResource extends Resource
{
    protected static ?string $model = Sale::class;
    protected static ?string $navigationLabel = 'Sales report';
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationGroup = 'Report';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListLaporanPenjualans::route('/'),
        ];
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->label('ID'),
                Tables\Columns\TextColumn::make('total_price')->label('Total Harga')->money('IDR'),
                Tables\Columns\TextColumn::make('created_at')->label('Tanggal')->dateTime('d M Y H:i'),
            ])
            ->actions([
                Action::make('export_excel')
                    ->label('Export to Excel')
                    ->action(fn () => Excel::download(new SalesExport, 'laporan_penjualan.xlsx'))
                    ->requiresConfirmation(),  // Memastikan konfirmasi sebelum melakukan ekspor

                Action::make('print')
                    ->label('Print')
                    ->url(fn () => route('laporan.penjualan.print'))
                    ->openUrlInNewTab(),
            ])
            ->bulkActions([]);
    }

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form->schema([]); // No form needed for report
    }
}
