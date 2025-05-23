<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StockOpnameResource\Pages;
use App\Models\StockOpname;
use App\Models\Book;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class StockOpnameResource extends Resource
{
    protected static ?string $navigationGroup = 'Transaction';
    protected static ?string $model = StockOpname::class;
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Select::make('book_id')
                ->relationship('book', 'judul')
                ->label('Book')
                ->required()
                ->reactive()
                ->afterStateUpdated(function (Set $set, $state) {
                    $book = Book::find($state);
                    $stock = $book?->stock ?? 0;
                    $set('stok_sebelumnya', $stock);
                    $set('stok_sekarang', $stock);
                }),

            Forms\Components\TextInput::make('stok_sebelumnya')
                ->label('Previous Stock')
                ->numeric()
                ->readOnly() // <- ini biar ikut submit
                ->required(),

            Forms\Components\TextInput::make('stok_sekarang')
                ->label('Stock Now')
                ->numeric()
                ->required(),

            Forms\Components\TextInput::make('keterangan')
                ->label('Information')
                ->maxLength(255),

            Forms\Components\DatePicker::make('tanggal')
                ->label('Date')
                ->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('book.judul')->label('Book'),
            Tables\Columns\TextColumn::make('stok_sebelumnya')->label('Previous Stock'),
            Tables\Columns\TextColumn::make('stok_sekarang')->label('Stock Now'),
            Tables\Columns\TextColumn::make('keterangan')->label('Information'),
            Tables\Columns\TextColumn::make('tanggal')->label('Date')->date(),
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
