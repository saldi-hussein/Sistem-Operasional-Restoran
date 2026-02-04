<?php

namespace App\Livewire;

use App\Models\Shift;
use Carbon\Carbon;
use Filament\Forms;
use Filament\Tables;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Table;
use Filament\Tables\TableComponent;
use Filament\Tables\Actions\DeleteAction;
use Illuminate\Database\Eloquent\Builder;

class ShiftsTable extends TableComponent implements HasTable
{
    protected static ?string $model = Shift::class;

    use InteractsWithTable;

    public function table(Table $table): Table
    {
        return $table
            ->query(fn (): Builder => Shift::query()->latest('id'))
            ->selectable(false)
            ->columns([
                TextColumn::make('day')
                    ->label('Hari/Tanggal')
                    ->formatStateUsing(
                        fn ($state) => Carbon::parse($state)->locale('id')->translatedFormat('l d F Y')
                    )
                    ->sortable(),
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
            ->filters([
                Tables\Filters\Filter::make('day')
                    ->form([
                        Forms\Components\DatePicker::make('day')->label('Filter Tanggal'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when($data['day'] ?? null, fn ($q, $date) => $q->whereDate('day', $date));
                    }),
            ])
            ->actions([
                Tables\Actions\Action::make('edit')
                    ->label('Edit')
                    ->icon('heroicon-m-pencil-square')
                    ->color('warning')
                    ->url(fn ($record) => route('filament.admin.resources.shifts.edit', $record)),
                DeleteAction::make()
                    ->label('Delete')
                    ->icon('heroicon-m-trash')
                    ->color('danger'),
            ])
            ->bulkActions([]);
    }

    public function render()
    {
        return view('livewire.shifts-table');
    }

    public function makeFilamentTranslatableContentDriver(): \Filament\Support\Contracts\TranslatableContentDriver|null
    {
        return null;
    }
}
