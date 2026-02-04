<?php

namespace App\Filament\Resources;

use App\Filament\Resources\IncomeOrderResource\Pages;
use App\Filament\Resources\IncomeOrderResource\RelationManagers;
use App\Models\IncomeOrder;
use App\Models\Order;
use Carbon\Carbon;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\Summarizers\Sum;
use Filament\Tables\Columns\Summarizers\Summarizer;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ViewColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Number;

class IncomeOrderResource extends Resource
{
    protected static ?string $model = Order::class;
    
    public static function getBreadcrumb(): string
    {
        return 'Laporan Penjualan';
    }

    public static function canViewAny(): bool
    {
        return auth()->user()?->can('view_income');
    }

    public static function getTitle(): string
    {
        return 'Laporan Penjualan';
    }

    public static function shouldRegisterNavigation(): bool
    {
        return false;
    }

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';
    protected static ?string $navigationLabel = 'Laporan Penjualan';
    
    protected static ?int $navigationSort = 7;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Add your form components here if needed
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(fn (Builder $query) => $query->where('status', 'done'))
            ->columns([
                TextColumn::make('user.name')
                    ->label('Waitress')
                    ->sortable()
                    ->searchable(),
                    
                TextColumn::make('total_price')
                    ->label('Total Harga')
                    ->money('IDR')
                    ->sortable(),
                    
                ViewColumn::make('item')
                    ->label('Items')
                    ->view('tables.columns.item-live'),
                    
                TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->formatStateUsing(fn(string $state) => ucfirst($state))
                    ->color(fn(string $state): string => match ($state) {
                        'done' => 'success',
                        'cancel' => 'danger',
                        'pending' => 'warning',
                        default => 'gray',
                    }),
                    
                TextColumn::make('created_at')
                    ->label('Tanggal')
                    ->date('d/m/Y H:i')
                    ->sortable()
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([



                Filter::make('periode')
                    ->label('Filter Periode')
                    ->form([
                        Select::make('month')
                            ->options([
                                '01' => 'Januari',
                                '02' => 'Februari',
                                '03' => 'Maret',
                                '04' => 'April',
                                '05' => 'Mei',
                                '06' => 'Juni',
                                '07' => 'Juli',
                                '08' => 'Agustus',
                                '09' => 'September',
                                '10' => 'Oktober',
                                '11' => 'November',
                                '12' => 'Desember',
                            ])
                            ->label('Bulan')
                            ->placeholder('Semua Bulan')
                            ->native(false),
                            
                        Select::make('year')
                            ->options(function () {
                                $currentYear = date('Y');
                                $years = [];
                                for ($i = $currentYear; $i >= $currentYear - 5; $i--) {
                                    $years[$i] = $i;
                                }
                                return $years;
                            })
                            ->label('Tahun')
                            ->placeholder('Pilih Tahun')
                            
                            ->native(false),
                    ])
                    ->query(function (Builder $query, array $data) {
                        if (!empty($data['month']) || !empty($data['year'])) {
                            if (!empty($data['month'])) {
                            $query->whereMonth('created_at', $data['month']);
                            if (!empty($data['year'])) {
                            $query->whereYear('created_at', $data['year']);
                        }
                        }
                        }
                        
                         else {
                            $query->whereDate('created_at', Carbon::today());
                        }
                        
                    })
                    ->indicateUsing(function (array $data): array {
                        $indicators = [];
                        
                        $monthNames = [
                            '01' => 'Januari', '02' => 'Februari', '03' => 'Maret',
                            '04' => 'April', '05' => 'Mei', '06' => 'Juni',
                            '07' => 'Juli', '08' => 'Agustus', '09' => 'September',
                            '10' => 'Oktober', '11' => 'November', '12' => 'Desember',
                        ];
                        
                        if (!empty($data['month'])) {
                            $indicators['month'] = 'Bulan: ' . ($monthNames[$data['month']] ?? $data['month']);
                        }
                        
                        if (!empty($data['year'])) {
                            $indicators['year'] = 'Tahun: ' . $data['year'];
                        }
                        
                        return $indicators;
                    }),
            ])
            ->filtersLayout(Tables\Enums\FiltersLayout::AboveContent)
            ->actions([
                // Add actions if needed
            ])
            ->bulkActions([
               
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
            'index' => Pages\ListIncomeOrders::route('/'),
            'create' => Pages\CreateIncomeOrder::route('/create'),
            'edit' => Pages\EditIncomeOrder::route('/{record}/edit'),
        ];
    }
}