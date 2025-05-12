<?php

namespace App\Filament\Widgets;

use App\Models\Sale;
use Leandrocfe\FilamentApexCharts\Widgets\ApexChartWidget;
use Filament\Widgets\ChartWidget;

class PenjualanPerBulanChart extends ChartWidget
{
    protected static ?string $chartId = 'penjualanPerBulan';
    protected static ?string $heading = 'Book Sales per Month';

    protected function getData(): array
    {
        return [
            //
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }

    protected function getOptions(): array
    {
        $data = Sale::selectRaw('MONTH(created_at) as bulan, SUM(total_price) as total')
            ->groupBy('bulan')
            ->pluck('total', 'bulan')->toArray();

        return [
            'chart' => ['type' => 'line'],
            'xaxis' => [
                'categories' => ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des'],
            ],
            'series' => [[
                'name' => 'Penjualan',
                'data' => array_replace(array_fill(1, 12, 0), $data),
            ]]
        ];
    }
}


