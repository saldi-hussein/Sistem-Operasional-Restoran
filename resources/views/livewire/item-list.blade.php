<div :key="order-items-{{ $recordId }}" class="space-y-1" style="margin-top: 1rem;">
    @foreach($items as $index => $item)
        <label wire:key="order-item-{{ $recordId }}-{{ $item['id'] ?? $index }}" class="flex items-center"
        style="margin-bottom: 1rem;">
            <span class="text-sm">{{ $item['name'] }} (x{{ $item['qty'] }})</span>
        </label>
    @endforeach
</div>