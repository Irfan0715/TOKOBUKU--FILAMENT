<?php

namespace App\Filament\Widgets;

use App\Models\Order;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use Filament\Tables\Columns\TextColumn;

class RecentOrders extends BaseWidget
{
    protected static ?string $heading = '📑 Recent Orders';

    // Ini harus full agar muncul full width dan di baris baru
    protected int|string|array $columnSpan = 'full';

    protected function getTableColumnSpan(): int|string|null
    {
        return 'full';
    }

    public function table(Table $table): Table
    {
        return $table
            ->query(Order::query()->latest()->limit(5))
            ->columns([
                TextColumn::make('id')->label('Order ID')->sortable(),

                TextColumn::make('member.nama')
                    ->label('Customer')
                    ->sortable(function ($query, $direction) {
                        $query->orderBy('members.nama', $direction);
                    })
                    ->searchable(['members.nama']),

                TextColumn::make('order_date')
                    ->label('Order Date')
                    ->dateTime('d M Y, H:i')
                    ->sortable(),

                TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->colors([
                        'warning' => 'Pending',
                        'info' => 'Shipped',
                        'success' => 'Completed',
                        'danger' => 'Cancelled',
                    ]),

                TextColumn::make('total')
                    ->label('Total (Rp)')
                    ->money('IDR', true)
                    ->sortable(),
            ]);
    }
}
