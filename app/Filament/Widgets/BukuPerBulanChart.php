<?php

namespace App\Filament\Widgets;

use App\Models\Book;
use Leandrocfe\FilamentApexCharts\Widgets\ApexChartWidget;
use Filament\Widgets\ChartWidget;

class BukuPerBulanChart extends ChartWidget
{
    protected static ?string $chartId = 'bukuPerBulan';
    protected static ?string $heading = 'Stok Buku Masuk per Bulan';

    protected function getData(): array
    {
        return [
            //
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }

    
    protected function getOptions(): array
    {
        $data = Book::selectRaw('MONTH(created_at) as bulan, COUNT(*) as total')
            ->groupBy('bulan')
            ->pluck('total', 'bulan')->toArray();

        return [
            'chart' => ['type' => 'bar'],
            'xaxis' => [
                'categories' => ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des'],
            ],
            'series' => [[
                'name' => 'Buku Masuk',
                'data' => array_replace(array_fill(1, 12, 0), $data),
            ]]
        ];
    }
}

