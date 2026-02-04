<?php
namespace App\Filament\Widgets;

use Filament\Widgets\Widget;

class ListMenuWidget extends Widget
{
    protected static string $view = 'filament.widgets.list-menu';

    public function getItems(): array
    {
        $user = auth()->user();

        $items = [
            [
                'title' => 'Info Piket',
                'icon' => 'heroicon-o-calendar-days',
                'link' => route('filament.admin.pages.info-dashboard-page'),
                'active_route' => 'filament.admin.pages.info-dashboard-page',
            ],
            [
                'title' => 'Manajemen Piket',
                'icon' => 'heroicon-o-table-cells',
                'link' => route('filament.admin.pages.info'),
                'active_route' => 'filament.admin.pages.info',
                'only_super_admin' => true,
            ],
            [
                'title' => 'Pesan',
                'icon' => 'heroicon-o-clipboard',
                'link' => route('filament.admin.resources.orders.create'),
                'active_route' => 'filament.admin.resources.orders.create',
            ],
            [
                'title' => 'Pesanan',
                'icon' => 'heroicon-o-clock',
                'link' => route('filament.admin.resources.orders.pending'),
                'active_route' => 'filament.admin.resources.orders.pending',
            ],
            [
                'title' => 'Pesanan Selesai',
                'icon' => 'heroicon-o-check-circle',
                'link' => route('filament.admin.resources.orders.index'),
                'active_route' => 'filament.admin.resources.orders.index',
            ],
            [
                'title' => 'Pembelian',
                'icon' => 'heroicon-o-banknotes',
                'link' => route('filament.admin.resources.outcomes.index'),
                'active_route' => 'filament.admin.resources.outcomes.*',
            ],
            [
                'title' => 'Stok',
                'icon' => 'heroicon-o-archive-box',
                'link' => route('filament.admin.resources.stocks.index'),
                'active_route' => 'filament.admin.resources.stocks.*',
            ],
            [
                'title' => 'Riwayat Stok',
                'icon' => 'heroicon-o-archive-box-arrow-down',
                'link' => route('filament.admin.resources.historystocks.index'),
                'active_route' => 'filament.admin.resources.historystocks.*',
            ],
            [
                'title' => 'Menu',
                'icon' => 'heroicon-o-clipboard-document-list',
                'link' => route('filament.admin.resources.menus.index'),
                'active_route' => 'filament.admin.resources.menus.*',
            ],
            [
                'title' => 'Laporan Penjualan',
                'icon' => 'heroicon-o-document-chart-bar',
                'link' => route('filament.admin.resources.income-orders.index'),
                'active_route' => 'filament.admin.resources.income-orders.*',
                'only_super_admin' => true,
            ],
            [
                'title' => 'Statistik Pendapatan',
                'icon' => 'heroicon-o-chart-bar',
                'link' => route('filament.admin.pages.income-chart-page'),
                'active_route' => 'filament.admin.pages.income-chart-page',
                'only_super_admin' => true,
            ],
            [
                'title' => 'Statistik Pengeluaran',
                'icon' => 'heroicon-o-chart-pie',
                'link' => route('filament.admin.pages.outcome-chart-page'),
                'active_route' => 'filament.admin.pages.outcome-chart-page',
                'only_super_admin' => true,
            ],
            [
                'title' => 'Manajemen User',
                'icon' => 'heroicon-o-user-group',
                'link' => route('filament.admin.resources.users.index'),
                'active_route' => 'filament.admin.resources.users.*',
                'only_super_admin' => true,
            ],
        ];

        // Filter: kalau bukan super admin, hapus item dengan flag only_super_admin
        return array_filter($items, function ($item) use ($user) {
            if (($item['only_super_admin'] ?? false) === true) {
                return $user && $user->hasRole('super_admin'); // ganti sesuai role kamu
            }
            return true;
        });
    }
}
