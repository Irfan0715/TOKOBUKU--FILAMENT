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
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;
    protected static ?string $navigationGroup = 'Transaction';
    protected static ?string $navigationIcon = 'heroicon-o-receipt-refund';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('member_id')
                    ->relationship('member', 'name') 
                    ->required(),

                DateTimePicker::make('order_date')
                    ->required(),

                Select::make('status')
                    ->options([
                        'Pending'   => 'Pending',
                        'Shipped'   => 'Shipped',
                        'Completed' => 'Completed',
                        'Cancelled' => 'Cancelled',
                    ])
                    ->required(),

                TextInput::make('shipping_cost')
                    ->numeric()
                    ->required(),

                TextInput::make('vat')
                    ->numeric()
                    ->required(),

                TextInput::make('discount')
                    ->numeric()
                    ->required(),

                TextInput::make('total')
                    ->numeric()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->label('Order ID')
                    ->sortable(),

                TextColumn::make('member.nama')
                    ->label('Customer Name'),

                TextColumn::make('order_date')
                    ->label('Order Date')
                    ->sortable(),

                TextColumn::make('status')
                    ->badge(),

                TextColumn::make('shipping_cost')
                    ->money('IDR'),

                TextColumn::make('vat')
                    ->money('IDR'),

                TextColumn::make('discount')
                    ->money('IDR'),

                TextColumn::make('total')
                    ->money('IDR'),
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
                Action::make('view')
                    ->url(fn (Order $record) => route('filament.admin.resources.orders.view', ['record' => $record->id]))
                    ->label('View')
                    ->icon('heroicon-o-eye'),
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
