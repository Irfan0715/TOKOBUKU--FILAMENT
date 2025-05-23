<?php

namespace App\Filament\Resources;

use App\Models\LaporanPenjualan;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Forms;
use App\Exports\SalesExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Filament\Resources\LaporanPenjualanResource\Pages;
use Filament\Tables\Actions\Action;

class LaporanPenjualanResource extends Resource
{
    protected static ?string $model = LaporanPenjualan::class;
    protected static ?string $navigationLabel = 'Sales Report';
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationGroup = 'Reports';

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
                Tables\Columns\TextColumn::make('id')
                    ->label('Transaction ID')
                    ->extraAttributes(['style' => 'padding-right: 10px; padding-left: 10px;']),

                Tables\Columns\TextColumn::make('tipe')
                    ->label('Type')
                    ->extraAttributes(['style' => 'padding-right: 10px; padding-left: 10px;']),

                Tables\Columns\TextColumn::make('total_harga')
                    ->label('Total Price')
                    ->money('IDR')
                    ->extraAttributes(['style' => 'padding-right: 10px; padding-left: 10px;']),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Date')
                    ->dateTime('d M Y H:i')
                    ->extraAttributes(['style' => 'padding-right: 10px; padding-left: 10px;']),
            ])
            ->actions([
                Action::make('export_excel')
                    ->label('Export to Excel')
                    ->action(fn () => Excel::download(new SalesExport, 'sales_report.xlsx'))
                    ->requiresConfirmation()
                    ->color('success'),  // warna hijau

                Action::make('print')
                    ->label('Print Report')
                    ->url(fn () => route('laporan.penjualan.print'))
                    ->openUrlInNewTab()
                    ->color('warning'),  // warna kuning/oranye
            ])
            ->bulkActions([]);
    }

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form->schema([]);
    }
}
