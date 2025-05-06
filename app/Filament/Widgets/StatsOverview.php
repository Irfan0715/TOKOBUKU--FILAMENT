<?php

namespace App\Filament\Widgets;

use App\Models\Book;
use App\Models\Member;
use App\Models\Sale;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget\Card;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Card::make('Total Buku', Book::count() . ' Judul'),
            Card::make('Total Member', Member::count() . ' Orang'),
            Card::make('Penjualan Hari Ini', 'Rp ' . number_format(
                Sale::whereDate('created_at', now())->sum('total_price'), 0, ',', '.'
            )),
            Card::make('Total Stok Buku', Book::sum('stock') . ' Buku'),
        ];
    }
}


