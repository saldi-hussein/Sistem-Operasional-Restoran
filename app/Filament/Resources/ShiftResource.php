<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ShiftResource\Pages;
use App\Filament\Resources\ShiftResource\RelationManagers;
use App\Models\Shift;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ShiftResource extends Resource
{
    protected static ?string $model = Shift::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Info';
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
            ->selectable(false)
            ->columns([
                TextColumn::make('user.name')->label('Dibuat Oleh'),
                TextColumn::make('day')->dateTime('d M Y H:i')->sortable(),
                TextColumn::make('stiwed'),
                TextColumn::make('tray'),
                TextColumn::make('tong_sampah'),
                TextColumn::make('inventaris'),
                TextColumn::make('kain_lap_waiters'),
                TextColumn::make('mushola'),
                TextColumn::make('clear_up_pondok'),
                TextColumn::make('lap_piring_dapur'),
                TextColumn::make('tas'),
                TextColumn::make('mematikan_lampu'),
                TextColumn::make('pondok_a'),
                TextColumn::make('pondok_b'),
                TextColumn::make('pondok_c'),
                TextColumn::make('pondok_d'),
                TextColumn::make('bar'),
                TextColumn::make('off'),

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
            'index' => Pages\ListShifts::route('/'),
            'create' => Pages\CreateShift::route('/create'),
            'edit' => Pages\EditShift::route('/{record}/edit'),
        ];
    }
    public static function shouldRegisterNavigation(): bool
    {
        return false;
    }
}
