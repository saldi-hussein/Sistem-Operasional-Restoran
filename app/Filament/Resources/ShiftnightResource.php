<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ShiftnightResource\Pages;
use App\Filament\Resources\ShiftnightResource\RelationManagers;
use App\Models\Shiftnight;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ShiftnightResource extends Resource
{
    protected static ?string $model = Shiftnight::class;
    
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function shouldRegisterNavigation(): bool
{
    return false;
}
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                 DatePicker::make('day')
                    ->label('Tanggal')
                    ->default(now()),
                TextInput::make('stiwed')->nullable(),
                TextInput::make('tray')->nullable(),
                TextInput::make('tong_sampah')->nullable(),
                TextInput::make('inventaris')->nullable(),
                TextInput::make('kain_lap_waiters')->nullable(),
                TextInput::make('mushola')->nullable(),
                TextInput::make('clear_up_pondok')->nullable(),
                TextInput::make('lap_piring_dapur')->nullable(),
                TextInput::make('tas')->nullable(),
                TextInput::make('mematikan_lampu')->nullable(),

                TextInput::make('pondok_a')->nullable(),
                TextInput::make('pondok_b')->nullable(),
                TextInput::make('pondok_c')->nullable(),
                TextInput::make('pondok_d')->nullable(),
                TextInput::make('bar')->nullable(),
                TextInput::make('off')->nullable(),
                TextInput::make('pulang_sore')->nullable(),

                TextInput::make('break_1')->nullable(),
                TextInput::make('break_2')->nullable(),
                TextInput::make('break_3')->nullable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([

                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListShiftnights::route('/'),
            'create' => Pages\CreateShiftnight::route('/create'),
            'edit' => Pages\EditShiftnight::route('/{record}/edit'),
        ];
    }
}
