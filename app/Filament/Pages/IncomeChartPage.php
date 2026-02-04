<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use App\Filament\Widgets\IncomeChart;

class IncomeChartPage extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-chart-bar';
    
    protected static string $view = 'filament.pages.income-chart';
    
    protected static ?string $title = 'Statistik Pendapatan';
    
    protected static ?string $navigationLabel = 'Statistik Pendapatan';
    
    
    protected static ?int $navigationSort = 8;

        public static function shouldRegisterNavigation(): bool
{
    // Example: Only register if the user is an admin
    return false;
}

    protected function getHeaderWidgets(): array
    {
        return [
            IncomeChart::class,
        ];
    }
}