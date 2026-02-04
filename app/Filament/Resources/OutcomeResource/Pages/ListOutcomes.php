<?php

namespace App\Filament\Resources\OutcomeResource\Pages;

use App\Filament\Resources\OutcomeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListOutcomes extends ListRecords
{
    protected static string $resource = OutcomeResource::class;
 public function getTitle(): string
    {
        return 'Pembelian'; 
    }
    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Input Data '),
        ];
    }

    public static function canCreate(): bool
    {
        return auth()->user()?->can('create_post');
    }    
}
