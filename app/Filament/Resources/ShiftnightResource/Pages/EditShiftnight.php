<?php

namespace App\Filament\Resources\ShiftnightResource\Pages;

use App\Filament\Resources\ShiftnightResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditShiftnight extends EditRecord
{
    protected static string $resource = ShiftnightResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
    protected function getRedirectUrl(): string
    {
        return '/admin/info'; // your desired route
    }
}
