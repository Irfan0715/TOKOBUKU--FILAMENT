<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BookResource\Pages;
use App\Models\Book;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class BookResource extends Resource
{
    protected static ?string $model = Book::class;
    protected static ?string $navigationIcon = 'heroicon-o-book-open';
    protected static ?string $navigationGroup = 'Master Data';
    protected static ?string $navigationLabel = 'Produk Buku';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('judul')
                    ->required()
                    ->label('Judul Buku'),

                Forms\Components\Select::make('category_id')
                    ->relationship('category', 'nama')
                    ->required()
                    ->label('Kategori Buku'),

                Forms\Components\TextInput::make('author')
                    ->required()
                    ->label('Penulis'),

                Forms\Components\FileUpload::make('cover')
                    ->image()
                    ->directory('covers')
                    ->label('Cover Buku'),

                Forms\Components\TextInput::make('price')
                    ->numeric()
                    ->required()
                    ->label('Harga'),
                Forms\Components\TextInput::make('stock')
                    ->numeric()
                    ->required()
                    ->label('Stok'),

                Forms\Components\Textarea::make('description')
                    ->label('Deskripsi'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('cover')->label('Cover')->size(50),
                Tables\Columns\TextColumn::make('judul')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('category.nama')->label('Kategori')->sortable(),
                Tables\Columns\TextColumn::make('author'),
                Tables\Columns\TextColumn::make('price')->money('IDR'),
                Tables\Columns\TextColumn::make('stock'),
                Tables\Columns\TextColumn::make('description')->searchable()->sortable(),
            ])
            ->filters([])
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
            'index' => Pages\ListBooks::route('/'),
            'create' => Pages\CreateBook::route('/create'),
            'edit' => Pages\EditBook::route('/{record}/edit'),
        ];
    }
}
