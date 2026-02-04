<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Models\Order;
use Carbon\Carbon;
use Filament\Forms;
use Filament\Navigation\NavigationItem;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ViewColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Orders';
    protected static ?int $navigationSort = 0;

    public static function shouldRegisterNavigation(): bool
    {
        return false;
    }

    public static function getBreadcrumb(): string
    {
        return 'Pesanan';
    }

    public static function canViewAny(): bool
    {
        return auth()->user()?->can('view_any_order');
    }

    public static function getNavigationItems(): array
    {
        return [
            NavigationItem::make()
                ->label('Semua Pesanan')
                ->icon('heroicon-o-list-bullet')
                ->url(static::getUrl('index')),
            NavigationItem::make()
                ->label('Pesanan')
                ->icon('heroicon-o-clock')
                ->url(static::getUrl('pending')),
        ];
    }

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('total_price')->numeric()->required(),
                Forms\Components\Select::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'done' => 'Done',
                        'cancel' => 'Cancel',
                    ])
                    ->default('pending'),
            ]);
    }

    public static function table(Table $table): Table
{
    $currentRoute = request()->route()->getName();
    $isPendingPage = str_contains($currentRoute, 'pending');

    $columns = [
        TextColumn::make('kode')->label("Nomor Pesanan"),
        TextColumn::make('no_table')->label("Nomor Meja"),
        TextColumn::make('user.name')->label('Pramusaji'),
        TextColumn::make('total_price')->money('Rp.')->label('Total Harga'),
        TextColumn::make('description')->label('Catatan'),
    ];

    if (!$isPendingPage) {
        $columns[] = TextColumn::make('updated_at')
            ->label('Selesai pada')
            ->formatStateUsing(fn ($state) => $state?->format('d-m-Y H:i'));

        $columns[] = TextColumn::make('status')
            ->label('Status')
            ->badge()
            ->formatStateUsing(fn (string $state) => ucfirst($state))
            ->color(fn (string $state) =>
                ['done' => 'success', 'cancel' => 'danger', 'pending' => 'warning'][$state] ?? 'gray');

        $columns[] = ViewColumn::make('item')->label('Items')->view('tables.columns.item-live');
    } else {
        $columns[] = ViewColumn::make('item')->label('Items')->view('tables.columns.item-checkboxes-live');
    }

    return $table
        ->modifyQueryUsing(fn (Builder $query) =>
            $isPendingPage
                ? $query->where('status', 'pending')->orderByDesc('updated_at')
                : $query->orderByDesc('updated_at')
        )
        ->recordUrl(null)
        ->columns($columns)

        ->filters($isPendingPage ? [] : [
            Filter::make('updated_at')
                ->form([
                    Forms\Components\DatePicker::make('date')->label('Filter Tanggal'),
                ])
                ->query(fn (Builder $query, array $data) =>
                    $query->when($data['date'] ?? null, fn ($q, $date) =>
                        $q->whereDate('updated_at', $date)
                    )
                ),

            Filter::make('today')
                ->label('Hari Ini')
                ->query(fn (Builder $query) =>
                    $query->whereDate('updated_at', Carbon::today())
                ),

            Filter::make('this_week')
                ->label('Minggu Ini')
                ->query(fn (Builder $query) =>
                    $query->whereBetween('updated_at', [
                        Carbon::now()->startOfWeek(),
                        Carbon::now()->endOfWeek(),
                    ])
                ),

            Filter::make('this_month')
                ->label('Bulan Ini')
                ->query(fn (Builder $query) =>
                    $query->whereMonth('updated_at', Carbon::now()->month)
                        ->whereYear('updated_at', Carbon::now()->year)
                ),
        ])

        ->actions([
            Tables\Actions\Action::make('order_done')
                ->label('Done')
                ->icon('heroicon-o-check')
                ->color('success')
                ->visible(fn ($record) => $record->status === 'pending')
                ->requiresConfirmation()
                ->action(function ($record) {
                    $items = json_decode($record->item, true);
                    foreach ($items as $index => $item) {
                        if (!($item['checked'] ?? false)) {
                            $menu = \App\Models\Menu::where('name', $item['name'])->first();
                            unset($items[$index]);
                            if ($menu) $menu->increment('quantity', $item['qty']);
                        }
                    }
                    $record->status = 'done';
                    $record->item = json_encode($items);
                    $record->total_price = $record->temp_price ?? 0;
                    $record->save();
                    return redirect()->route('filament.admin.resources.orders.index');
                }),

            Tables\Actions\Action::make('cancel_item')
                ->label('Cancel Item')
                ->icon('heroicon-o-x-circle')
                ->color('danger')
                ->visible(fn ($record) => $record->status === 'pending')
                ->requiresConfirmation()
                ->action(function ($record) {
                    $items = json_decode($record->item, true);
                    $updated = false;
                    foreach ($items as $index => $item) {
                        if (!($item['checked'] ?? false)) {
                            $items[$index]['checked'] = true;
                            $menu = \App\Models\Menu::where('name', $item['name'])->first();
                            if ($menu) $menu->increment('quantity', $item['qty']);
                            $updated = true;
                        }
                    }
                    if ($updated) {
                        $record->item = json_encode($items);
                        $allCancelled = collect($items)->every(fn ($item) => $item['checked'] ?? false);
                        if ($allCancelled) $record->status = 'cancel';
                        $record->save();
                        if ($allCancelled) return redirect()->route('filament.admin.resources.orders.index');
                    }
                }),

            Tables\Actions\Action::make('customEdit')
                ->label('Tambah Order')
                ->url(fn (Order $record) =>
                    OrderResource::getUrl('create', ['recordId' => $record->id])
                )
                ->disabled(fn (Order $record) =>
                    $record->status !== 'pending'
                )
                ->color(fn (Order $record) =>
                    $record->status === 'pending' ? 'primary' : 'gray'
                )
                ->visible(fn ($record) => $record->status === 'pending'),
        ])

        ->bulkActions([]);
}


    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOrders::route('/'),
            'pending' => Pages\PendingOrders::route('/pending'),
            'create' => Pages\MakeOrderPage::route('/make/{recordId?}'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }
}
