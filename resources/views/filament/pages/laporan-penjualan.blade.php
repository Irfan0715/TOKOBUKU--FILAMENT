<x-filament::page>
    <h2 class="text-2xl font-bold mb-4">Laporan Penjualan</h2>

    {{ $this->table }}

    <div class="mt-4 text-right font-bold">
        Total Penjualan: Rp {{ number_format($sales->sum('total_price'), 0, ',', '.') }}
    </div>
</x-filament::page>
