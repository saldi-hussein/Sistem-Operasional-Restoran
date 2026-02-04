<?php

namespace App\Filament\Resources\IncomeOrderResource\Pages;

use App\Filament\Resources\IncomeOrderResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateIncomeOrder extends CreateRecord
{
    protected static string $resource = IncomeOrderResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
