<?php

namespace App\Filament\Resources\HistorystockResource\Pages;

use App\Filament\Resources\HistorystockResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditHistorystock extends EditRecord
{
    protected static string $resource = HistorystockResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
