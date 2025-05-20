<?php

namespace App\Filament\Widgets;

use App\Models\Book;
use App\Models\Member;
use App\Models\Sale;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class StatsOverview extends StatsOverviewWidget
{
    protected function getCards(): array
    {
        $totalBooks = Book::count();
        $totalMembers = Member::count();
        $todaySalesCount = Sale::whereDate('created_at', now())->count();
        $totalBookStock = Book::sum('stock');

        return [
            Card::make('📚 Total Books', number_format($totalBooks))
                ->description('Total number of books in store')
                ->descriptionIcon('heroicon-m-book-open')
                ->color('success'),

            Card::make('🧑‍🤝‍🧑 Total Members', number_format($totalMembers))
                ->description('Active registered members')
                ->descriptionIcon('heroicon-m-user-group')
                ->color('info'),

            Card::make('🛒 Today\'s Sales', number_format($todaySalesCount))
                ->description('Books sold today')
                ->descriptionIcon('heroicon-m-currency-dollar')
                ->color('warning'),

            Card::make('📦 Total Stock', number_format($totalBookStock))
                ->description('Total book stock available')
                ->descriptionIcon('heroicon-m-archive-box')
                ->color('primary'),
        ];
    }
}
