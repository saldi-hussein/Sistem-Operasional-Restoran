<?php

namespace App\Filament\Resources\ShiftResource\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class ShiftOverview extends BaseWidget
{


    protected function getCards(): array
    {
        return [
            Card::make(' Shift Management', '')
                ->description('Lihat atau atur data shift')
                ->color('info') // Adds accent color
                ->url(route('filament.admin.resources.shifts.index'))
                ->extraAttributes([
                    'class' => 'text-xl py-10 px-6 shadow-lg hover:shadow-xl bg-red-500 transition duration-200', // 👈 make it bigger
                ]),
                
        ];
    }
}
