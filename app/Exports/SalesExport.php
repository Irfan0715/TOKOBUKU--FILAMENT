<?php

namespace App\Exports;

use App\Models\Sale;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SalesExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Sale::all()
            ->map(function ($sale) {
                return [
                    'ID'      => $sale->id,
                    'Tanggal' => $sale->sale_date,  // atau $sale->created_at jika lebih tepat
                    'Total'   => $sale->total_price,
                ];
            });
    }

    public function headings(): array
    {
        return [
            'ID',
            'Tanggal',
            'Total',
        ];
    }
}
