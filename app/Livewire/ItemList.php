<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Order;

class ItemList extends Component
{
    public $recordId;
    public $items = [];
    
    public function mount($recordId)
    {
        $this->recordId = $recordId;
        $record = Order::findOrFail($recordId);
        $this->items = json_decode($record->item, true) ?? [];
    }

    public function toggle($index)
    {
        $this->items[$index]['checked'] = !$this->items[$index]['checked'];
        Order::find($this->recordId)->update([
            'item' => $this->items
        ]);
    }

    public function render()
    {
        return view('livewire.item-list', [
            'items' => $this->items
        ]);
    }
}