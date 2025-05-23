<?php

namespace App\Filament\Widgets;

use App\Models\Book;
use Filament\Widgets\ChartWidget;

class BukuPerBulanChart extends ChartWidget
{
    protected static ?string $chartId = 'bukuPerBulan';
    protected static ?string $heading = 'Book Stock Incoming per Month';

    protected function getType(): string
    {
        return 'bar';
    }

    protected function getData(): array
    {
        $bulanLabels = ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des'];

        $bookData = Book::selectRaw('MONTH(created_at) as bulan, COUNT(*) as total')
            ->groupBy('bulan')
            ->pluck('total', 'bulan')
            ->toArray();

        $bookSeries = [];
        for ($i = 1; $i <= 12; $i++) {
            $bookSeries[] = $bookData[$i] ?? 0;
        }

        return [
            'datasets' => [
                [
                    'label' => 'Book Incoming',
                    'data' => $bookSeries,
                    'backgroundColor' => 'rgba(34, 197, 94, 0.7)',
                    'borderColor' => '#22c55e',
                ],
            ],
            'labels' => $bulanLabels,
        ];
    }
}
