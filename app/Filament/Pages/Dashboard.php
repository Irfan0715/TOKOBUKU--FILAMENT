<?php

namespace App\Filament\Pages;

use Filament\Pages\Dashboard as BaseDashboard;

class Dashboard extends BaseDashboard
{
    protected static ?string $title = 'Dashboard';

    public function getWidgets(): array
    {
    return [
        \App\Filament\Widgets\StatsOverview::class,
        \App\Filament\Widgets\BukuPerBulanChart::class,
        \App\Filament\Widgets\PenjualanPerBulanChart::class,
        \App\Filament\Widgets\RecentOrders::class,
    ];
    }

}
