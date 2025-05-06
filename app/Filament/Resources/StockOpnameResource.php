<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StockOpnameResource\Pages;
use App\Models\StockOpname;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class StockOpnameResource extends Resource
{
    protected static ?string $navigationGroup = 'Transaksi';
    protected static ?string $model = StockOpname::class;
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Select::make('book_id')
                ->relationship('book', 'title')
                ->label('Buku')
                ->required(),
            Forms\Components\TextInput::make('stock')->label('Stok')->numeric()->required(),
            Forms\Components\DatePicker::make('date')->label('Tanggal')->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('book.title')->label('Buku'),
            Tables\Columns\TextColumn::make('stock')->label('Stok'),
            Tables\Columns\TextColumn::make('date')->label('Tanggal')->date(),
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
            'index' => Pages\ListStockOpnames::route('/'),
            'create' => Pages\CreateStockOpname::route('/create'),
            'edit' => Pages\EditStockOpname::route('/{record}/edit'),
        ];
    }
}
