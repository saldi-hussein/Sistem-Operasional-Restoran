<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OutcomeResource\Pages;
use App\Models\Outcome;
use Carbon\Carbon;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class OutcomeResource extends Resource
{
    protected static ?string $model = Outcome::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Pembelian';

    public static function canDelete(Model $record): bool
    {
        return auth()->user()?->can('delete_outcome');
    }

    public static function shouldRegisterNavigation(): bool
    {
        return false;
    }

    public static function getBreadcrumb(): string
    {
        return 'Pembelian';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('deskripsi')
                    ->label('Nama Barang Yang Dibeli')
                    ->required()
                    ->maxLength(255),

                TextInput::make('jumlah')
                    ->label('Jumlah')
                    ->required()
                    ->maxLength(255),

                TextInput::make('harga')
                    ->label('Harga')
                    ->required()
                    ->numeric()
                    ->extraInputAttributes(['oninput' => "this.value = this.value.replace(/[^0-9]/g, '')"])
                    ->maxLength(11),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('deskripsi')->label('Deskripsi')->searchable(),
                TextColumn::make('jumlah')->label('Jumlah'),
                TextColumn::make('harga')->label('Harga')->numeric(),
                TextColumn::make('created_at')->label('Tanggal')->dateTime(),
                TextColumn::make('user.name')
                    ->label('Dibeli Oleh')
                    ->searchable()
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                Filter::make('day')
                    ->label('Filter Tanggal Dibuat')
                    ->form([
                        DatePicker::make('date')->label('Tanggal'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['date'] ?? null,
                                fn(Builder $q, $date) => $q->whereDate('created_at', $date),
                            );
                    }),

                Filter::make('today')
                    ->label('Hari Ini')
                    ->query(fn(Builder $query): Builder => $query->whereDate('created_at', Carbon::today()))
                    ->toggle(),

                Filter::make('this_week')
                    ->label('Minggu Ini')
                    ->query(fn(Builder $query): Builder =>
                        $query->whereBetween('created_at', [
                            Carbon::now()->startOfWeek(),
                            Carbon::now()->endOfWeek(),
                        ])
                    )
                    ->toggle(),

                Filter::make('this_month')
                    ->label('Bulan Ini')
                    ->query(fn(Builder $query): Builder =>
                        $query->whereMonth('created_at', Carbon::now()->month)
                              ->whereYear('created_at', Carbon::now()->year)
                    )
                    ->toggle(),
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->visible(fn ($record) =>
                        Carbon::parse($record->created_at)->isToday()
                    ),
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
            'index' => Pages\ListOutcomes::route('/'),
            'create' => Pages\CreateOutcome::route('/create'),
            'edit' => Pages\EditOutcome::route('/{record}/edit'),
        ];
    }
}
