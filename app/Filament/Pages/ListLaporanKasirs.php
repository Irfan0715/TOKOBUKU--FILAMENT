<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use App\Models\User;
use Filament\Tables;

class ListLaporanKasirs extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $navigationLabel = 'Laporan Kasir';
    protected static ?string $navigationGroup = 'Laporan';
    protected static string $view = 'filament.pages.laporan-kasir';

    public function mount()
    {
        // Fetch kasir data with sales count and sum
        $this->kasirs = User::withCount('sales')->withSum('sales', 'total_price')->get();
    }

    public function getTableQuery()
    {
        // Query for users with their sales count and sum
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
}
