<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use App\Filament\Widgets\OutcomeChart;

class OutcomeChartPage extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-chart-bar';
    
    protected static string $view = 'filament.pages.outcome-chart';
    
    protected static ?string $title = 'Statistik Pengeluaran';
    
    protected static ?string $navigationLabel = 'Statistik Pengeluaran';
    
    protected static ?int $navigationSort = 9;

       public static function shouldRegisterNavigation(): bool
{
    // Example: Only register if the user is an admin
    return false;
}

    protected function getHeaderWidgets(): array
    {
        return [
            OutcomeChart::class,
        ];
    }
}