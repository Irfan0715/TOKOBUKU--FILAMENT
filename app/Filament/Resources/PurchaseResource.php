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
    protected static ?string $navigationGroup = 'Transaction';
    protected static ?string $model = Purchase::class;
    protected static ?string $navigationIcon = 'heroicon-o-truck';

public static function form(Form $form): Form
{
    return $form->schema([
        Forms\Components\Select::make('book_id')
            ->relationship('book', 'judul')
            ->label('Book')
            ->required(),

        Forms\Components\TextInput::make('jumlah')
            ->numeric()
            ->label('Amount')
            ->required(),

        Forms\Components\TextInput::make('harga_beli')
            ->numeric()
            ->label('Purchase price')
            ->required(),

        Forms\Components\DatePicker::make('tanggal')
            ->label('Date')
            ->required(),
    ]);
}


    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('book.judul')->label('Book'),
            Tables\Columns\TextColumn::make('jumlah')->label('Amount'),
            Tables\Columns\TextColumn::make('harga_beli')->label('Purchase price')->money('IDR'),
            Tables\Columns\TextColumn::make('tanggal')->label('Date')->dateTime(),
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
