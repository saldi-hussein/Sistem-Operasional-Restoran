<div :key="order-items-{{ $recordId }}" class="space-y-1" style="margin-top: 1rem;">
    @foreach($items as $index => $item)
        <label wire:key="order-item-{{ $recordId }}-{{ $item['id'] ?? $index }}" class="flex items-center"
        style="margin-bottom: 1rem;">
            <input
                type="checkbox"
                class=""
                style="margin-right: 4px; border-radius:4px;"
                wire:click="toggle({{ $index }})"
                @checked($item['checked'] ?? false)
            >
            
            <span class="text-sm">{{ $item['name'] }} (x{{ $item['qty'] }})</span>
        </label>
    @endforeach
</div>