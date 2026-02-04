<?php

namespace App\Livewire;

use App\Models\Shift;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Concerns\InteractsWithTable;
use Livewire\Component;

class ShiftsTable extends Component implements Tables\Contracts\HasTable
{
    use InteractsWithTable;

    public function table(Table $table): Table
    {
        return $table
            ->query(Shift::query())
            ->selectable(false)
            ->columns([
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
                TextColumn::make('break_1'),
                TextColumn::make('break_2'),
                TextColumn::make('break_3'),
            ])
            ->actions([
                Actions\EditAction::make(),
            ])
            ->bulkActions([
                Actions\BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public function render()
    {
        return view('livewire.shift-dashboard');
    }

    public function makeFilamentTranslatableContentDriver(): \Filament\Support\Contracts\TranslatableContentDriver|null
    {
        return null;
    }
}
