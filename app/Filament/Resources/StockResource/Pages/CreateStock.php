<?php

namespace App\Filament\Resources\StockResource\Pages;

use App\Filament\Resources\StockResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateStock extends CreateRecord
{
    protected static string $resource = StockResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['description'] = "null";
        $data['user_id'] = auth()->user()->id;

        return $data;
    }
    

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

           // Add permission methods
    public static function canCreate(): bool
    {
        return auth()->user()?->can('create_stock') ?? false;
    }
    
    
}
