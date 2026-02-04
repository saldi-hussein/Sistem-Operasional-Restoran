<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    public static function canViewAny(): bool
    {
        return auth()->user()?->can('view_any_user');
    }

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function shouldRegisterNavigation(): bool
    {
        return false;
    }

    protected static ?int $navigationSort = 10;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')->required(),

                TextInput::make('email')
                    ->required()
                    ->unique(ignoreRecord: true),

                TextInput::make('password')
                    ->required(fn ($context) => $context === 'create')
                    ->password()
                    ->revealable(),

                // ✅ ROLE hanya tampil jika user yang sedang diedit BUKAN id=1
                Select::make('roles')
                    ->label('Role')
                    ->relationship('roles', 'name')
                    ->visible(fn ($record) => $record?->id !== 1)
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name'),

                TextColumn::make('email'),

                // ✅ Role hanya terlihat untuk user login id=1
                TextColumn::make('roles.name')
                    ->visible(fn () => auth()->id() === 1),
            ])
            ->filters([])
            ->actions([
                // ✅ Edit hanya muncul untuk login id=1
                Tables\Actions\EditAction::make()
                    ->visible(fn () => auth()->id() === 1),
            ])
            ->bulkActions([]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
