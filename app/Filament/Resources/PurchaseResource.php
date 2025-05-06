<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PurchaseResource\Pages;
use App\Models\Purchase;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class PurchaseResource extends Resource
{
    protected static ?string $navigationGroup = 'Transaksi';
    protected static ?string $model = Purchase::class;
    protected static ?string $navigationIcon = 'heroicon-o-truck';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Select::make('book_id')
                ->relationship('book', 'title')
                ->label('Buku')
                ->required(),
            Forms\Components\TextInput::make('quantity')->numeric()->label('Jumlah')->required(),
            Forms\Components\TextInput::make('purchase_price')->numeric()->label('Harga Beli')->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('book.title')->label('Buku'),
            Tables\Columns\TextColumn::make('quantity')->label('Jumlah'),
            Tables\Columns\TextColumn::make('purchase_price')->label('Harga')->money('IDR'),
            Tables\Columns\TextColumn::make('created_at')->label('Tanggal')->dateTime(),
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
            'index' => Pages\ListPurchases::route('/'),
            'create' => Pages\CreatePurchase::route('/create'),
            'edit' => Pages\EditPurchase::route('/{record}/edit'),
        ];
    }
}
