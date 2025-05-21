<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Models\Order;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationGroup = 'Transaction';
    protected static ?string $navigationIcon = 'heroicon-o-receipt-refund';

    /**
     * Fungsi untuk menghitung total
     */
    public static function calculateTotal($subtotal, $shippingCost, $vatPercent, $discountPercent): float
    {
        $subtotal = (float) $subtotal;
        $shippingCost = (float) $shippingCost;
        $vatPercent = (float) $vatPercent;
        $discountPercent = (float) $discountPercent;

        $vatAmount = ($subtotal * $vatPercent) / 100;
        $discountAmount = ($subtotal * $discountPercent) / 100;

        return ($subtotal + $shippingCost + $vatAmount) - $discountAmount;
    }

    public static function form(Form $form): Form
    {
        return $form->schema([
            Select::make('member_id')
                ->relationship('member', 'nama')
                ->label('Customer')
                ->required(),

            Select::make('book_id')
                ->relationship('book', 'judul')
                ->label('Book')
                ->required(),

            DateTimePicker::make('order_date')
                ->label('Order Date & Time')
                ->required(),

            Select::make('status')
                ->label('Status')
                ->options([
                    'Pending'   => 'Pending',
                    'Shipped'   => 'Shipped',
                    'Completed' => 'Completed',
                    'Cancelled' => 'Cancelled',
                ])
                ->required(),

            Select::make('payment_method_id')
                ->relationship('paymentMethod', 'name') // Asumsi relasi di model Order: paymentMethod()
                ->label('Payment Method')
                ->required(),

            TextInput::make('subtotal')
                ->label('Subtotal (Rp)')
                ->numeric()
                ->required()
                ->reactive()
                ->afterStateUpdated(function (callable $set, $state, callable $get) {
                    $total = self::calculateTotal(
                        $state,
                        $get('shipping_cost') ?? 0,
                        $get('vat') ?? 0,
                        $get('discount') ?? 0
                    );
                    $set('total', $total);
                }),

            TextInput::make('shipping_cost')
                ->label('Shipping Cost (Rp)')
                ->numeric()
                ->required()
                ->afterStateUpdated(function (callable $set, $state, callable $get) {
                    $total = self::calculateTotal(
                        $get('subtotal') ?? 0,
                        $state,
                        $get('vat') ?? 0,
                        $get('discount') ?? 0
                    );
                    $set('total', $total);
                }),

            TextInput::make('vat')
                ->label('VAT (%)')
                ->numeric()
                ->required()
                ->afterStateUpdated(function (callable $set, $state, callable $get) {
                    $total = self::calculateTotal(
                        $get('subtotal') ?? 0,
                        $get('shipping_cost') ?? 0,
                        $state,
                        $get('discount') ?? 0
                    );
                    $set('total', $total);
                }),

            TextInput::make('discount')
                ->label('Discount (%)')
                ->numeric()
                ->required()
                ->afterStateUpdated(function (callable $set, $state, callable $get) {
                    $total = self::calculateTotal(
                        $get('subtotal') ?? 0,
                        $get('shipping_cost') ?? 0,
                        $get('vat') ?? 0,
                        $state
                    );
                    $set('total', $total);
                }),

            TextInput::make('total')
                ->label('Total (Rp)')
                ->numeric()
                ->disabled()
                ->dehydrateStateUsing(function ($state, callable $get) {
                    return self::calculateTotal(
                        $get('subtotal') ?? 0,
                        $get('shipping_cost') ?? 0,
                        $get('vat') ?? 0,
                        $get('discount') ?? 0
                    );
                }),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('id')
                ->label('Order ID')
                ->sortable(),

            TextColumn::make('member.nama')
                ->label('Customer')
                ->sortable()
                ->searchable(),

            TextColumn::make('book.judul')
                ->label('Book Title')
                ->sortable()
                ->searchable(),

            TextColumn::make('order_date')
                ->label('Order Date')
                ->dateTime()
                ->sortable(),

            TextColumn::make('status')
                ->label('Status')
                ->badge()
                ->colors([
                    'warning' => 'Pending',
                    'info'    => 'Shipped',
                    'success' => 'Completed',
                    'danger'  => 'Cancelled',
                ])
                ->sortable(),

            TextColumn::make('paymentMethod.name')
                ->label('Payment Method')
                ->sortable()
                ->searchable(),

            TextColumn::make('subtotal')
                ->label('Subtotal')
                ->money('IDR', true),

            TextColumn::make('shipping_cost')
                ->label('Shipping')
                ->money('IDR', true),

            TextColumn::make('vat')
                ->label('VAT (%)'),

            TextColumn::make('discount')
                ->label('Discount (%)'),

            TextColumn::make('total')
                ->label('Total')
                ->money('IDR', true),
        ])->actions([
            ViewAction::make(),
            EditAction::make(),
            DeleteAction::make(),
        ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrder::route('/create'),
            'edit'   => Pages\EditOrder::route('/{record}/edit'),
            'view'   => Pages\ViewOrder::route('/{record}/view'),
        ];
    }
}
