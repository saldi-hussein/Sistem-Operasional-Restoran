<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class InfoDashboardPage extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-home';
    protected static ?string $navigationLabel = 'Dashboard';
    protected static ?string $title = 'Info Piket';


    public static function shouldRegisterNavigation(): bool
    {
        // Example: Only register if the user is an admin
        return false;
    }

    


    protected static string $view = 'filament.pages.info-dashboard-page';

    public string $selectedDate = '';

    public function mount(): void
    {
        $this->selectedDate = now()->toDateString();
    }



}
