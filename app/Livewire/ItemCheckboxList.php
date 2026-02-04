<?php
namespace App\Livewire;
use Livewire\Component;
use App\Models\Order;
use App\Models\Menu;

class ItemCheckboxList extends Component
{
    public $recordId;
    public $items = [];
    public $totalPrice = 0;

    public function mount($recordId)
    {
        $this->recordId = $recordId;
        $record = Order::findOrFail($recordId);
        $this->items = json_decode($record->item, true) ?? [];
        $this->calculateTotalPrice();
    }

    public function toggle($index)
    {
        $this->items[$index]['checked'] = !$this->items[$index]['checked'];
        
        // Update the order with new items
        Order::find($this->recordId)->update([
            'item' => json_encode($this->items)
        ]);
        
        // Recalculate total price and update temp_price
        $this->calculateTotalPrice();
        $this->updateTempPrice();
    }

    public function calculateTotalPrice()
    {
        $total = 0;
        
        foreach ($this->items as $item) {
            if (isset($item['checked']) && $item['checked'] === true) {
                // Find menu by name
                $menu = Menu::where('name', $item['name'])->first();
                
                if ($menu) {
                    $quantity = isset($item['qty']) ? (int)$item['qty'] : 1;
                    $total += $menu->price * $quantity;
                }
            }
        }
        
        $this->totalPrice = $total;
        return $total;
    }

    public function updateTempPrice()
    {
        // Update temp_price in orders table based on checked items
        Order::find($this->recordId)->update([
            'temp_price' => $this->totalPrice
        ]);
    }

    public function getCheckedItems()
    {
        return array_filter($this->items, function($item) {
            return isset($item['checked']) && $item['checked'] === true;
        });
    }

    public function getCheckedItemsWithMenuDetails()
    {
        $checkedItems = [];
        
        foreach ($this->items as $item) {
            if (isset($item['checked']) && $item['checked'] === true) {
                $menu = Menu::where('name', $item['name'])->first();
                
                if ($menu) {
                    $checkedItems[] = [
                        'name' => $item['name'],
                        'qty' => isset($item['qty']) ? (int)$item['qty'] : 1,
                        'price' => $menu->price,
                        'subtotal' => $menu->price * (isset($item['qty']) ? (int)$item['qty'] : 1),
                        'menu_details' => $menu
                    ];
                }
            }
        }
        
        return $checkedItems;
    }

    public function render()
    {
        return view('livewire.item-checkbox-list', [
            'items' => $this->items,
            'totalPrice' => $this->totalPrice,
            'checkedItems' => $this->getCheckedItemsWithMenuDetails()
        ]);
    }
}