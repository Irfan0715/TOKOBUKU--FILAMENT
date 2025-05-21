<x-filament::widget>
    <x-filament::card>
        <h2 class="text-xl font-bold mb-4">📑 Recent Orders</h2>
        <table class="table-auto w-full text-left border-collapse">
            <thead>
                <tr>
                    <th class="border-b py-2">#</th>
                    <th class="border-b py-2">Customer</th>
                    <th class="border-b py-2">Date</th>
                    <th class="border-b py-2">Status</th>
                    <th class="border-b py-2">Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($this->getRecentOrders() as $order)
                    <tr>
                        <td class="border-b py-2">{{ $order->id }}</td>
                        <td class="border-b py-2">{{ $order->member->nama ?? '-' }}</td>
                        <td class="border-b py-2">{{ \Carbon\Carbon::parse($order->order_date)->format('d M Y, H:i') }}</td>
                        <td class="border-b py-2">
                            <span class="px-2 py-1 rounded 
                                @if($order->status === 'Pending') bg-yellow-200 text-yellow-800
                                @elseif($order->status === 'Shipped') bg-blue-200 text-blue-800
                                @elseif($order->status === 'Completed') bg-green-200 text-green-800
                                @elseif($order->status === 'Cancelled') bg-red-200 text-red-800
                                @else bg-gray-200 text-gray-800 @endif">
                                {{ $order->status }}
                            </span>
                        </td>
                        <td class="border-b py-2">Rp{{ number_format($order->total, 0, ',', '.') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </x-filament::card>
</x-filament::widget>
