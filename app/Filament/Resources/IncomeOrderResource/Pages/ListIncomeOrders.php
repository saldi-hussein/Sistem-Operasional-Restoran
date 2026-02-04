<?php

namespace App\Filament\Resources\IncomeOrderResource\Pages;

use App\Filament\Resources\IncomeOrderResource;
use App\Models\Order;
use Carbon\Carbon;
use Filament\Actions;
use Illuminate\Database\Eloquent\Builder;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Number;

class ListIncomeOrders extends ListRecords
{
    protected static string $resource = IncomeOrderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getTableQuery(): Builder
    {
        return parent::getTableQuery()->where('status', 'done');
    }

    public function getHeader(): ?\Illuminate\Contracts\View\View
    {
        $query = Order::where('status', 'done');

        // Apply filters if they exist
        $tableFilters = $this->tableFilters;
        if (!empty($tableFilters['periode']['month']) || !empty($tableFilters['periode']['year'])) {
            if (!empty($tableFilters['periode']['month'])) {
                $query->whereMonth('created_at', $tableFilters['periode']['month']);
            }
            if (!empty($tableFilters['periode']['year'])) {
                $query->whereYear('created_at', $tableFilters['periode']['year']);
            }
        } else {
            $query->whereDate('created_at', Carbon::today());
        }



        $totalRevenue = $query->sum('total_price');
        $totalTransactions = $query->count();
        $averagePerTransaction = $totalTransactions > 0 ? $totalRevenue / $totalTransactions : 0;

        $data = [
            'totalRevenue' => Number::currency($totalRevenue, 'IDR', 'id'),
            'totalTransactions' => $totalTransactions,
            'averagePerTransaction' => Number::currency($averagePerTransaction, 'IDR', 'id'),
        ];

        return view('header', $data);
    }
}