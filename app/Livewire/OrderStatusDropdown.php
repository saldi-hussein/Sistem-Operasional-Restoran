<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Order;

class OrderStatusDropdown extends Component
{
    public $orderId;
    public $currentStatus;

    public function mount($orderId, $currentStatus)
    {
        $this->orderId = $orderId;
        $this->currentStatus = $currentStatus;
    }

    public function updatedCurrentStatus($value)
    {
        Order::where('id', $this->orderId)->update([
            'status' => $value,
        ]);
        
        // Optional: add a flash message
        session()->flash('message', 'Status updated successfully');
    }

    public function render()
    {
        return view('livewire.order-status-dropdown');
    }
}