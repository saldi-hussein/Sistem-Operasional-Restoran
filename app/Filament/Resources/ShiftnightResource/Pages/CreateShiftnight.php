<?php

namespace App\Filament\Resources\ShiftnightResource\Pages;

use App\Filament\Resources\ShiftnightResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateShiftnight extends CreateRecord
{
     
    protected static string $resource = ShiftnightResource::class;
    protected function getRedirectUrl(): string
    {
        return '/admin/info'; // your desired route
    }

    public static function canCreate(): bool
    {
        return auth()->user()?->can('create_shiftnight');
    }
}
