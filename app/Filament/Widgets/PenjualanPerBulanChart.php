<?php

namespace App\Filament\Widgets;

use App\Models\Sale;
use App\Models\Order;
use Filament\Widgets\ChartWidget;

class PenjualanPerBulanChart extends ChartWidget
{
    protected static ?string $chartId = 'penjualanPerBulan';
    protected static ?string $heading = 'Book Sales & Orders per Month';

    protected function getType(): string
    {
        return 'line';
    }

    protected function getData(): array
    {
        $bulanLabels = ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des'];

        $salesData = Sale::selectRaw('MONTH(created_at) as bulan, SUM(total_price) as total')
            ->groupBy('bulan')
            ->pluck('total', 'bulan')
            ->toArray();

        $orderData = Order::selectRaw('MONTH(created_at) as bulan, SUM(total) as total')
            ->groupBy('bulan')
            ->pluck('total', 'bulan')
            ->toArray();

        // Isi default 0 untuk tiap bulan
        $salesSeries = [];
        $ordersSeries = [];
        for ($i = 1; $i <= 12; $i++) {
            $salesSeries[] = $salesData[$i] ?? 0;
            $ordersSeries[] = $orderData[$i] ?? 0;
        }

        return [
            'datasets' => [
                [
                    'label' => 'Penjualan',
                    'data' => $salesSeries,
                    'borderColor' => '#3b82f6',
                    'backgroundColor' => 'rgba(59, 130, 246, 0.4)',
                    'tension' => 0.4,
                ],
                [
                    'label' => 'Order',
                    'data' => $ordersSeries,
                    'borderColor' => '#f97316',
                    'backgroundColor' => 'rgba(249, 115, 22, 0.4)',
                    'tension' => 0.4,
                ],
            ],
            'labels' => $bulanLabels,
        ];
    }
}
