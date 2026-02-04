<?php

namespace App\Filament\Resources\IncomeOrderResource\Pages;

use App\Filament\Resources\IncomeOrderResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditIncomeOrder extends EditRecord
{
    protected static string $resource = IncomeOrderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
