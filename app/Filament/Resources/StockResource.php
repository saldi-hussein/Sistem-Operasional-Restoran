<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StockResource\Pages;
use App\Filament\Resources\StockResource\RelationManagers;
use App\Models\Stock;
use Carbon\Carbon;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class StockResource extends Resource
{
    protected static ?string $model = Stock::class;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Stok';

    protected static ?int $navigationSort = 1;
    // Add permission methods
    public static function canCreate(): bool
    {
        return auth()->user()?->can('create_stock') ?? false;
    }

    public static function getBreadcrumb(): string
    {
        return 'Stok'; // Misalnya, ini akan menggantikan "Orders" atau "Daftar Pesanan"
    }

    public static function shouldRegisterNavigation(): bool
    {
        // Example: Only register if the user is an admin
        return false;
    }



    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')->required(),
                TextInput::make('amount')->required(),
                DatePicker::make('day')->label('Tanggal')->default(now()),
            ]);
    }

    public static function table(Table $table): Table
{
    return $table
        ->columns([
            TextColumn::make('name'),
            TextColumn::make('amount')->label('Sisa'),
            TextColumn::make('day')->date()->label('Tanggal'),
            TextColumn::make('user.name')
                ->label('Dilaporkan Oleh')
                ->searchable()
                ->sortable(),
            TextColumn::make('updated_at')->date()->label('Diubah Pada')
        ])
        ->filters([
            Filter::make('day')
                ->label('Filter Tanggal Dibuat')
                ->form([
                    DatePicker::make('date')->label('Tanggal'),
                ])
                ->query(function (Builder $query, array $data): Builder {
                    return $query
                        ->when(
                            $data['date'],
                            fn(Builder $q, $date) => $q->whereDate('day', $date),
                        );
                }),

            Filter::make('today')
                ->label('Hari Ini')
                ->query(fn(Builder $query): Builder => $query->whereDate('day', Carbon::today()))
                ->toggle(),

            Filter::make('this_week')
                ->label('Minggu Ini')
                ->query(
                    fn(Builder $query): Builder =>
                    $query->whereBetween('day', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
                )
                ->toggle(),

            Filter::make('this_month')
                ->label('Bulan Ini')
                ->query(
                    fn(Builder $query): Builder =>
                    $query->whereMonth('day', Carbon::now()->month)
                        ->whereYear('day', Carbon::now()->year)
                )
                ->toggle(),
        ])
        ->actions([
            Tables\Actions\EditAction::make(),
        ])
        ->bulkActions([]); // ✅ Checkbox hilang total
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
            'index' => Pages\ListStocks::route('/'),
            'create' => Pages\CreateStock::route('/create'),
            'edit' => Pages\EditStock::route('/{record}/edit'),
        ];
    }
}
