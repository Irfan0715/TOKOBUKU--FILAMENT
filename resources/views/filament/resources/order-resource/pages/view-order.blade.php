<x-filament::page>
    <h1 class="text-3xl font-bold mb-6">Detail Order #{{ $record->id }}</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
        <div>
            <h2 class="text-xl font-semibold mb-3">Informasi Pelanggan</h2>
            <p><strong>Nama:</strong> {{ $record->member->nama }}</p>
            <p><strong>Telepon:</strong> {{ $record->member->telepon ?? '-' }}</p>
            <p><strong>Alamat:</strong> {{ $record->member->alamat ?? '-' }}</p>
        </div>

        <div>
            <h2 class="text-xl font-semibold mb-3">Detail Order</h2>
            <p><strong>Tanggal Order:</strong> {{ \Carbon\Carbon::parse($record->order_date)->format('d M Y, H:i') }}</p>
            <p><strong>Status:</strong> 
                <span class="inline-block px-2 py-1 rounded 
                    @if($record->status === 'Pending') bg-yellow-200 text-yellow-800
                    @elseif($record->status === 'Shipped') bg-blue-200 text-blue-800
                    @elseif($record->status === 'Completed') bg-green-200 text-green-800
                    @elseif($record->status === 'Cancelled') bg-red-200 text-red-800
                    @else bg-gray-200 text-gray-800 @endif">
                    {{ $record->status }}
                </span>
            </p>
            <p><strong>Biaya Pengiriman:</strong> Rp{{ number_format($record->shipping_cost, 0, ',', '.') }}</p>
            <p><strong>VAT:</strong> Rp{{ number_format($record->vat, 0, ',', '.') }}</p>
            <p><strong>Diskon:</strong> Rp{{ number_format($record->discount, 0, ',', '.') }}</p>
            <p><strong>Total:</strong> <span class="font-bold text-lg">Rp{{ number_format($record->total, 0, ',', '.') }}</span></p>
        </div>
    </div>

    <a href="{{ route('filament.admin.resources.orders.index') }}" class="inline-block mt-4 text-blue-600 hover:underline">
        ← Kembali ke daftar Order
    </a>
</x-filament::page>
