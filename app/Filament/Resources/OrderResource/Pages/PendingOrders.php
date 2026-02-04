<?php

namespace App\Filament\Resources\OrderResource\Pages;

use App\Filament\Resources\OrderResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\ViewColumn;
use Illuminate\Database\Eloquent\Builder;

class PendingOrders extends ListRecords
{
    protected static string $resource = OrderResource::class;

    public function getTitle(): string
    {
        return 'Pesanan'; // 👈 custom page title
    }

    protected function getTableQuery(): Builder
    {
        return parent::getTableQuery()->where('status', 'pending');
    }
    protected function getTableActions(): array
    {
        return [];
    }

   
}
