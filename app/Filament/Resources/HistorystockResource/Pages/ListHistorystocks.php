<?php

namespace App\Filament\Resources\HistorystockResource\Pages;

use App\Filament\Resources\HistorystockResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListHistorystocks extends ListRecords
{
    protected static string $resource = HistorystockResource::class;

     public function getTitle(): string
    {
        return 'Riwayat Stok'; // Misalnya, ini akan menggantikan "Orders" atau "Daftar Pesanan"
    }

    
}
