<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Resources\Pages\CreateRecord;
use Filament\Resources\Pages\EditRecord;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Hash;

class UserResource extends Resource
{
    protected static ?string $navigationGroup = 'User';
    protected static ?string $model = User::class;
    protected static ?string $navigationIcon = 'heroicon-o-user-circle';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('name')
                ->label('Nama')
                ->required(),

            Forms\Components\TextInput::make('email')
                ->label('Email')
                ->email()
                ->required()
                ->disabled(function ($get, $livewire) {
                    // Saat create, email bisa diisi
                    if ($livewire instanceof CreateRecord) {
                        return false;
                    }
                    // Saat edit, hanya user itu sendiri yang bisa edit email-nya
                    if ($livewire instanceof EditRecord) {
                        return $livewire->getRecord()?->id !== auth()->id();
                    }
                    return true;
                }),

            Forms\Components\TextInput::make('password')
                ->label('Password')
                ->password()
                ->dehydrateStateUsing(fn ($state) => $state ? Hash::make($state) : null)
                ->required(fn (string $operation) => $operation === 'create')
                ->visible(function ($get, $livewire) {
                    // Password tampil saat create, atau saat edit dirinya sendiri
                    if ($livewire instanceof CreateRecord) {
                        return true;
                    }

                    if ($livewire instanceof EditRecord) {
                        return $livewire->getRecord()?->id === auth()->id();
                    }

                    return false;
                }),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('name')->label('Nama'),
            Tables\Columns\TextColumn::make('email')->label('Email'),
            Tables\Columns\TextColumn::make('created_at')->label('Dibuat')->dateTime(),
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
            'index'  => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit'   => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
