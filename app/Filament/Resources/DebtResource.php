<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DebtResource\Pages;
use App\Models\Debt;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class DebtResource extends Resource
{
    protected static ?string $navigationGroup = 'Transaksi';
    protected static ?string $model = Debt::class;
    protected static ?string $navigationIcon = 'heroicon-o-currency-dollar';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('nama_pelanggan')
                ->label('Nama Member')
                ->required(),
            Forms\Components\TextInput::make('jumlah_hutang')
                ->label('Jumlah Hutang')
                ->numeric()
                ->required(),
            Forms\Components\TextInput::make('tanggal')
                ->label('Tanggal')
                ->required(),
            Forms\Components\TextInput::make('keterangan')
                ->label('Keterangan')
                ->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('nama_member')->label('Nama Member'),
            Tables\Columns\TextColumn::make('jumlah_hutang')->label('Jumlah Hutang')->money('IDR'),
            Tables\Columns\TextColumn::make('tanggal')->label('Tanggal')->date(),
            Tables\Columns\TextColumn::make('keterangan')->label('Keterangan'),
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
            'index' => Pages\ListDebts::route('/'),
            'create' => Pages\CreateDebt::route('/create'),
            'edit' => Pages\EditDebt::route('/{record}/edit'),
        ];
    }
}
