<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class InfoTables extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-information-circle';
    protected static ?string $slug = 'info';
    protected static string $view = 'filament.pages.info-tables';

    public static function shouldRegisterNavigation(): bool
{
    // Example: Only register if the user is an admin
    return false;
}
    protected static ?string $title = 'Manajemen Piket';
    protected static ?string $navigationLabel = 'Info';

    // Optional: control who sees this page
    public static function canAccess(): bool
    {
         return auth()->check() && auth()->user()->can('create_breaktime');
    }
    
}
