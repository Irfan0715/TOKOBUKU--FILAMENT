<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DebtResource\Pages;
use App\Models\Debt;
use App\Models\Member;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class DebtResource extends Resource
{
    protected static ?string $navigationGroup = 'Transaction';
    protected static ?string $model = Debt::class;
    protected static ?string $navigationIcon = 'heroicon-o-currency-dollar';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Select::make('member_id')
                ->label('Member Name')
                ->relationship('member', 'nama')
                ->required(),

            Forms\Components\TextInput::make('jumlah_hutang')
                ->label('Amount of Debt')
                ->numeric()
                ->required(),

            Forms\Components\DatePicker::make('tanggal')
                ->label('Date')
                ->required(),

            Forms\Components\TextInput::make('keterangan')
                ->label('Information')
                ->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('member.nama')
                ->label('Member Name')
                ->searchable()
                ->sortable(),

            Tables\Columns\TextColumn::make('jumlah_hutang')
                ->label('Amount of Debt')
                ->money('IDR'),

            Tables\Columns\TextColumn::make('tanggal')
                ->label('Date')
                ->date(),

            Tables\Columns\TextColumn::make('keterangan')
                ->label('Information'),
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
