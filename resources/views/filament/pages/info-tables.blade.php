<x-filament-panels::page>

    <div class="space-y-4">
        <div class="space-y-2">
        <div class="flex items-center justify-between">
                <h2 class="text-xl font-bold">Piket Pagi</h2>
                <x-filament::button tag="a" href="{{ url('admin/shifts/create') }}">
                    Jadwalkan piket
                </x-filament::button>

            </div>
            <livewire:shifts-table />
        </div>
<div class="space-y-2">
        <div class="flex items-center justify-between">
                <h2 class="text-xl font-bold">Piket Malam</h2>
                <x-filament::button tag="a" href="{{ url('admin/shiftnights/create') }}">
                    Jadwalkan piket
                </x-filament::button>
            </div>
            <livewire:shiftnights-table />
        </div>

      

    </div>


</x-filament-panels::page>