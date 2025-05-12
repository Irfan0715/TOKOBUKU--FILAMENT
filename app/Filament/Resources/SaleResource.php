<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SaleResource\Pages;
use App\Models\Sale;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class SaleResource extends Resource
{
    protected static ?string $navigationGroup = 'Transaction';
    protected static ?string $model = Sale::class;
    protected static ?string $navigationIcon = 'heroicon-o-shopping-cart';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Select::make('book_id')
                ->relationship('book', 'judul')
                ->label('Book')
                ->required(),
            Forms\Components\TextInput::make('quantity')
                ->label('Amount')
                ->numeric()
                ->required(),
            Forms\Components\TextInput::make('total_price')
                ->label('Total Price')
                ->numeric()
                ->required(),
            Forms\Components\Select::make('payment_method_id')
                ->relationship('paymentMethod', 'name')
                ->label('Payment Method')
                ->required(),
            Forms\Components\DatePicker::make('sale_date')
                ->label('Sale Date')
                ->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('book.judul')->label('Book'),
            Tables\Columns\TextColumn::make('quantity')->label('Amount'),
            Tables\Columns\TextColumn::make('total_price')->label('Total Price')->money('IDR'),
            Tables\Columns\TextColumn::make('sale_date')->label('Sale Date')->date(),

        ])
        ->actions([
            Tables\Actions\EditAction::make(),
        ])
        ->bulkActions([
            Tables\Actions\DeleteBulkAction::make(),
        ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSales::route('/'),
            'create' => Pages\CreateSale::route('/create'),
            'edit' => Pages\EditSale::route('/{record}/edit'),
        ];
    }
}
