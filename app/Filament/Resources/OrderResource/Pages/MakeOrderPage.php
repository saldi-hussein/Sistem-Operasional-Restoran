<?php

namespace App\Filament\Resources\OrderResource\Pages;

use App\Filament\Resources\OrderResource;
use App\Models\Menu;
use App\Models\Order;
use Filament\Resources\Pages\Page; // Pastikan ini Page
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class MakeOrderPage extends Page
{
    protected static string $resource = OrderResource::class;
    protected static string $view = 'filament.resources.order-resource.pages.make-order-page';

    // ✅ Ubah judul halaman
    protected static ?string $title = 'Pesan';

    public $tableNumber = '';
    public $quantities = [];
    public $recordId = null;

    public $description = '';
    public $existingOrderItems = [];

    public string $searchQuery = '';
    public string $currentSearchTerm = '';

    protected function rules(): array
    {
        return [
            'tableNumber' => [
                $this->recordId ? 'nullable' : 'required',
                'string',
                'max:255',
            ],
            'quantities' => [
                'required',
                'array',
                function ($attribute, $value, $fail) {
                    $selectedNewItems = array_filter($value, fn($qty) => $qty > 0);
                    if (!$this->recordId && empty($selectedNewItems)) {
                        $fail('Please add at least one menu item to the order.');
                    }
                    if ($this->recordId && empty($selectedNewItems) && empty($this->existingOrderItems)) {
                        $fail('An order must have at least one item. Add items or consider deleting the order if empty.');
                    }
                },
            ],
            'description' => ['nullable', 'string', 'max:500'],
        ];
    }

    /**
     * Daftar menu untuk halaman Pesan.
     * - TETAP menampilkan semua menu.
     * - Jika available = false, kita set "quantity = 0" HANYA UNTUK TAMPILAN,
     *   supaya UI memperlakukan sama seperti stok habis (disabled).
     */
    public function getFilteredMenuItemsProperty()
    {
        return Menu::query()
            ->when($this->currentSearchTerm, function ($query) {
                $query->where('name', 'like', '%' . $this->currentSearchTerm . '%');
            })
            ->get()
            ->map(function ($menu) {
                // Tandai disabled di UI: treat as out-of-stock when not available
                if (! $menu->available) {
                    $menu->quantity = 0; // in-memory only (tidak disimpan ke DB)
                }
                return $menu;
            });
    }

    public function mount($recordId = null): void
    {
        $this->recordId = $recordId;

        if ($recordId) {
            $order = Order::findOrFail($recordId);
            $this->tableNumber = $order->no_table;
            $this->existingOrderItems = json_decode($order->item, true) ?? [];
            $this->description = $order->description;
            // quantities dibiarkan kosong (semua 0) agar form fresh
        }
    }

    public function performSearch(): void
    {
        $this->currentSearchTerm = $this->searchQuery;
    }

    /**
     * Tambah item:
     * - Jika tidak available atau stok 0 → abaikan (silent), tanpa notifikasi.
     */
    public function addItem($menuId): void
    {
        $menu = Menu::find($menuId);
        if (! $menu || ! $menu->available || $menu->quantity <= 0) {
            return; // no-op (UI juga sudah disabled karena quantity=0 saat not available)
        }

        $this->quantities[$menuId] = ($this->quantities[$menuId] ?? 0) + 1;
        $menu->decrement('quantity');
    }

    public function decreaseItem($menuId): void
    {
        if (!isset($this->quantities[$menuId]) || $this->quantities[$menuId] <= 0) {
            return;
        }

        $this->quantities[$menuId]--;
        Menu::find($menuId)?->increment('quantity');

        if ($this->quantities[$menuId] <= 0) {
            unset($this->quantities[$menuId]);
        }
    }

    protected function getRedirectUrl(): string
    {
        // Kembali ke index OrderResource
        return $this->getResource()::getUrl('index');
    }

    public function submit(): void
    {
        try {
            $this->validate();

            $newItems = [];
            foreach ($this->quantities as $menuId => $qty) {
                if ($qty > 0) {
                    $menu = Menu::find($menuId);
                    if ($menu) {
                        $newItems[] = [
                            'name' => $menu->name,
                            'qty' => $qty,
                            'checked' => false,
                        ];
                    }
                }
            }

            $finalItems = array_values(
                array_filter(array_merge(
                    $this->existingOrderItems,
                    $newItems
                ), fn($item) => $item['qty'] > 0)
            );

            if (empty($finalItems)) {
                throw ValidationException::withMessages([
                    'quantities' => 'The order must contain at least one item.'
                ]);
            }

            $total = 0;
            foreach ($finalItems as $item) {
                $menu = Menu::where('name', $item['name'])->first();
                if ($menu) {
                    $total += $menu->price * $item['qty'];
                }
            }

            if ($this->recordId) {
                Order::find($this->recordId)->update([
                    'item' => json_encode($finalItems),
                    'total_price' => $total,
                    'description' => $this->description,
                ]);
            } else {
                Order::create([
                    'kode' => str_pad(mt_rand(0, 999999), 6, '0', STR_PAD_LEFT),
                    'item' => json_encode($finalItems),
                    'total_price' => $total,
                    'no_table' => $this->tableNumber,
                    'status' => 'pending',
                    'user_id' => Auth::id(),
                    'description' => $this->description,
                ]);
            }

            // Redirect ke daftar pending (atau pakai getRedirectUrl() sesuai preferensi)
            redirect()->to('/admin/orders/pending');

        } catch (ValidationException $e) {
            throw $e;
        } catch (\Exception $e) {
            // Biar sederhana dan tanpa notifikasi — lempar saja biar kelihatan saat dev
            throw $e;
        }
    }
}
