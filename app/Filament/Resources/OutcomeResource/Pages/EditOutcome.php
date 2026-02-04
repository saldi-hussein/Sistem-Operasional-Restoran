<?php

namespace App\Filament\Resources\OutcomeResource\Pages;

use App\Filament\Resources\OutcomeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditOutcome extends EditRecord
{
    protected static string $resource = OutcomeResource::class;

  
    protected function mutateFormDataBeforeSave(array $data): array
    {
        $data['user_id'] = auth()->user()->id;

        return $data;
    }   

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    
}
