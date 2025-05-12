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
            Card::make('Total Books', Book::count() . ' Title'),
            Card::make('Total Members', Member::count() . ' People'),
            Card::make('Today Sales', 'Rp ' . number_format(
                Sale::whereDate('created_at', now())->sum('total_price'), 0, ',', '.'
            )),
            Card::make('Total Book Stock', Book::sum('stock') . ' Book'),
        ];
    }
}


