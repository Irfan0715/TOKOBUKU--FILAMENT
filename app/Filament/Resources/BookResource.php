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
    protected static ?string $navigationLabel = 'Book Products';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('judul')
                    ->required()
                    ->label('Title'),

                Forms\Components\Select::make('category_id')
                    ->relationship('category', 'nama')
                    ->required()
                    ->label('Category'),

                Forms\Components\TextInput::make('author')
                    ->required()
                    ->label('Author'),

                Forms\Components\FileUpload::make('cover')
                    ->image()
                    ->directory('covers')
                    ->label('Book Cover'),

                Forms\Components\TextInput::make('price')
                    ->numeric()
                    ->required()
                    ->label('Harga'),

                Forms\Components\TextInput::make('stock')
                    ->numeric()
                    ->required()
                    ->label('Stock'),

                Forms\Components\Textarea::make('description')
                    ->label('Description'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('cover')
                    ->label('Cover')
                    ->formatStateUsing(fn ($state) => $state
                        ? '<img src="' . asset('storage/' . $state) . '" style="height: 150px; width: 100px; object-fit: cover; border-radius: 8px;" />'
                        : '-')
                    ->html(),

                Tables\Columns\TextColumn::make('judul')
                    ->label('Title')
                    ->searchable()
                    ->sortable()
                    ->limit(30)
                    ->wrap(),

                Tables\Columns\TextColumn::make('category.nama')
                    ->label('Category')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('author')
                    ->label('Author')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('price')
                    ->label('Harga')
                    ->money('IDR'),

                Tables\Columns\TextColumn::make('stock')
                    ->label('Stock'),

                Tables\Columns\TextColumn::make('description')
                    ->label('Description')
                    ->limit(50)
                    ->wrap()
                    ->toggleable(isToggledHiddenByDefault: false),
            ])
            ->defaultPaginationPageOption(10)
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
