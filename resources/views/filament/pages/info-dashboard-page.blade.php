<x-filament-panels::page>
    <div class="space-y-6">
        

        <div class="space-y-4">
            <div class="space-y-2">
                <h2 class="text-xl font-bold">Piket Pagi</h2>
                <livewire:shift-dashboard :selected-date="$selectedDate" wire:key="shift" />
            </div>

            <div class="space-y-2">
                <h2 class="text-xl font-bold">Piket Malam</h2>
                <livewire:shiftnight-dashboard :selected-date="$selectedDate" wire:key="shift" />
            </div>

          
        </div>
    </div>
</x-filament-panels::page>
