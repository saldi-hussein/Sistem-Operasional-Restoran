<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MenuResource\Pages;
use App\Models\Menu;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class MenuResource extends Resource
{
    protected static ?string $model = Menu::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Menu';
    protected static ?int $navigationSort = 3;

    public static function shouldRegisterNavigation(): bool
    {
        return false;
    }

    public static function canCreate(): bool
    {
        return auth()->user()?->can('create_menu');
    }

    public static function canUpdate(): bool
    {
        return auth()->user()?->can('update_menu');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')->required()->label('Nama Menu'),
                Textarea::make('description')->label('Deskripsi '),
                FileUpload::make('image')->label('Foto '),
                TextInput::make('price')
                    ->numeric()
                    ->required()
                    ->label('Harga'),
                TextInput::make('quantity')
                    ->numeric()
                    ->required()
                    ->label('Jumlah'),
                Toggle::make('available')
                    ->label('Tersedia')
                    ->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('id', 'desc') // ✅ Tampilkan menu terbaru di atas
            ->columns([
                TextColumn::make('name')->searchable()->label('Nama'),
                TextColumn::make('price')->money('Rp.')->label('Harga'),
                ImageColumn::make('image')->label('Gambar'),
                TextColumn::make('quantity')->label('Jumlah'),
                IconColumn::make('available')->label('Tesedia')->boolean(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->visible(fn (Menu $record) => auth()->user()?->can('update_menu', $record)),
            ])
            ->bulkActions([]); // ✅ Hapus checkbox (karena bulk action dihilangkan)
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMenus::route('/'),
            'create' => Pages\CreateMenu::route('/create'),
            'edit' => Pages\EditMenu::route('/{record}/edit'),
        ];
    }
}
