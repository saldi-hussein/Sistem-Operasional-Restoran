<?php
namespace App\Filament\Resources\OrderResource\Pages;

use App\Filament\Resources\OrderResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ViewColumn;
use Illuminate\Database\Eloquent\Builder;

class ListOrders extends ListRecords
{
    protected static string $resource = OrderResource::class;

    public function getTitle(): string
    {
        return 'Semua Pesanan'; // 👈 custom page title
    }

    protected function getTableQuery(): Builder
    {
        return parent::getTableQuery()->where('status', '!=', 'pending');
    }

    protected function getTableActions(): array
    {
        return [];
    }

    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('kode')->label("Nomor Pesanan"),
            TextColumn::make('no_table')->label("Nomor Meja"),
            TextColumn::make('user.name')->label('Waitress'),
            TextColumn::make('total_price')->money('IDR'),
            ViewColumn::make('item')
                ->label('Items')
                ->view('tables.columns.item-live'),
            TextColumn::make('status')
                ->label('Status')
                ->badge()
                ->formatStateUsing(fn(string $state) => ucfirst($state))
                ->color(fn(string $state): string => match ($state) {
                    'done' => 'success',   // green color
                    'cancel' => 'danger',  // red color
                    default => 'danger',   // red for any other status
                }),
        ];
    }

    
}