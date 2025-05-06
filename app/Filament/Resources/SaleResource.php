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
    protected static ?string $navigationGroup = 'Transaksi';
    protected static ?string $model = Sale::class;
    protected static ?string $navigationIcon = 'heroicon-o-shopping-cart';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Select::make('book_id')
                ->relationship('book', 'judul')
                ->label('Buku')
                ->required(),
            Forms\Components\TextInput::make('quantity')
                ->label('Jumlah')
                ->numeric()
                ->required(),
            Forms\Components\TextInput::make('total_price')
                ->label('Total Harga')
                ->numeric()
                ->required(),
            Forms\Components\Select::make('payment_method_id')
                ->relationship('paymentMethod', 'name')
                ->label('Metode Pembayaran')
                ->required(),
            Forms\Components\DatePicker::make('sale_date')
                ->label('Tanggal Penjualan')
                ->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('book.judul')->label('Buku'),
            Tables\Columns\TextColumn::make('quantity')->label('Jumlah'),
            Tables\Columns\TextColumn::make('total_price')->label('Total')->money('IDR'),
            Tables\Columns\TextColumn::make('sale_date')->label('Tanggal')->date(),
            Tables\Columns\TextColumn::make('kasir.name')->label('Kasir'), // Menampilkan nama kasir dari relasi user
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
