<?php


namespace App\Filament\Resources\OrderResource\Pages;

use Filament\Tables\Columns\ViewColumn;

use App\Filament\Resources\OrderResource;
use Filament\Resources\Pages\ListRecords;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;

class CompletedOrders extends ListRecords
{
    protected static string $resource = OrderResource::class;

    public function getBreadcrumb(): string
    {
        return 'Pesanan Selesai'; // Misalnya, ini akan menggantikan "Orders" atau "Daftar Pesanan"
    }
    public function getTitle(): string
    {
        return 'Pesanan Selesai'; // 👈 custom page title
    }

    protected function getTableQuery(): Builder
    {
        return parent::getTableQuery()->where('status',  'done');
    }

    protected function getTableColumns(): array
    {
        return [

            TextColumn::make('status')
                ->badge()
                ->color(fn(string $state): string => match ($state) {
                    'done' => 'Done',
                    default => 'gray',
                }),
            ViewColumn::make('item')
                ->label('Items')
                ->view('tables.columns.item-live'),

        ];
    }

    protected function getTableActions(): array
    {
        return [];
    }
}

