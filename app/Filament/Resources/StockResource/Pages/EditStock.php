<?php

namespace App\Filament\Resources\StockResource\Pages;

use App\Filament\Resources\StockResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use App\Models\Historystock;

class EditStock extends EditRecord
{
    protected static string $resource = StockResource::class;

  

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $data['user_id'] = auth()->id();

        return $data;
    }   

    protected function beforeSave(): void
    {
        // Create a history record after stock update
        $stock = $this->record->toArray();
        unset($stock['id'], $stock['created_at'], $stock['updated_at'], $stock['unit_id']);
        Historystock::create($stock);
    }
}
