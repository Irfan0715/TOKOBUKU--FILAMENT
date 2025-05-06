<?php

namespace App\Exports;

use App\Models\Sale;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SalesExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Sale::with('user')
            ->get()
            ->map(function ($sale) {
                return [
                    'ID' => $sale->id,
                    'Kasir' => $sale->user->name,
                    'Tanggal' => $sale->sale_date,
                    'Total' => $sale->total_amount,
                ];
            });
    }

    public function headings(): array
    {
        return [
            'ID',
            'Kasir',
            'Tanggal',
            'Total',
        ];
    }
}
