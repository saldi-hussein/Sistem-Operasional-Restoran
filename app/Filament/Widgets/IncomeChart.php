<?php
namespace App\Filament\Widgets;

use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Leandrocfe\FilamentApexCharts\Widgets\ApexChartWidget;
use Carbon\Carbon;

class IncomeChart extends ApexChartWidget
{
    protected static ?string $chartId = 'incomeChart';
    protected static ?string $heading = 'Pemasukan Bulanan';
    protected static ?int $sort = 1;



public function getOptions(): array
{
    // Query orders, sum total_price grouped by month
  $orders = Order::select(
        DB::raw('MONTH(created_at) as month'),
        DB::raw('SUM(total_price) as total')
    )
    ->where('status', 'done') // hanya ambil status done
    ->groupBy(DB::raw('MONTH(created_at)'))
    ->orderBy(DB::raw('MONTH(created_at)'))
    ->pluck('total', 'month');


    // Prepare months labels (1 → Jan, 2 → Feb, ...)
    $allMonths = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

    // Fill data with 0 if month has no orders
    $incomeData = [];
    foreach (range(1, 12) as $m) {
        $incomeData[] = $orders[$m] ?? 0;
    }

    return [
     'chart' => [
        'type' => 'line',
        'height' => 350,
        'toolbar' => [
            'show' => true,
            'tools' => [
                'download' => true,   // hanya ini yang aktif
                'selection' => false,
                'zoom' => false,
                'zoomin' => true,
                'zoomout' => true,
                'pan' => false,
                'reset' => false,   
            ],
        ],
        // 'zoom' => [
        //     'enabled' => false,
        // ],
    ],
        
        'series' => [
            [
                'name' => 'Income',
                'data' => $incomeData,
            ],
        ],
        'xaxis' => [
            'categories' => $allMonths,
        ],
    ];
}


}