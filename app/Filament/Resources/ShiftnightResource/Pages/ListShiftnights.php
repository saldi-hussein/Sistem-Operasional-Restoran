<?php

namespace App\Filament\Resources\ShiftnightResource\Pages;

use App\Filament\Resources\ShiftnightResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListShiftnights extends ListRecords
{
    protected static string $resource = ShiftnightResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
