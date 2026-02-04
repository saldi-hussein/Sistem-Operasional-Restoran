<?php

namespace App\Filament\Resources\MenuResource\Pages;

use App\Filament\Resources\MenuResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateMenu extends CreateRecord
{
    public function getTitle(): string
    {
        return 'Tambah Menu'; // 👈 custom page title
    }

    protected static string $resource = MenuResource::class;

    public static function canAccess(array $parameters = []): bool
    {
        return auth()->check() && auth()->user()->can('create_menu');
    }
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
