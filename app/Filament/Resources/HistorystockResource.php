<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HistorystockResource\Pages;
use App\Filament\Resources\HistorystockResource\RelationManagers;
use App\Models\Historystock;
use Carbon\Carbon;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class HistorystockResource extends Resource
{
    protected static ?string $model = Historystock::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Riwayat Stok';
 
    public static function getBreadcrumb(): string
    {
        return 'Riwayat Stok'; // Misalnya, ini akan menggantikan "Orders" atau "Daftar Pesanan"
    }

    public static function shouldRegisterNavigation(): bool
{
    // Example: Only register if the user is an admin
    return false;
}
    
    protected static ?int $navigationSort = 2;
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('description')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\DateTimePicker::make('day')
                    ->required(),
                Forms\Components\TextInput::make('amount')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('user_id')
                    ->numeric()
                    ->default(null),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('day')
                    ->date()    
                    ->sortable(),
                Tables\Columns\TextColumn::make('amount')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('user.name')
                    
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true)->label('Dibuat Pada'),
              
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



               
            ])
            ->actions([

            ])->filters([
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
            ->bulkActions([
                
            ])->defaultSort('created_at', 'desc');
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
            'index' => Pages\ListHistorystocks::route('/'),
        
        ];
    }
}
