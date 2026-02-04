<x-filament-panels::page>
    <div class="space-y-6">
        {{-- Filter Section --}}
        <x-filament::section>
            <x-slot name="heading">
                <div class="flex items-center gap-2">
                    <x-filament::icon 
                        icon="heroicon-o-funnel" 
                        class="w-5 h-5"
                    />
                    <span>Filter</span>
                </div>
            </x-slot>

            <x-slot name="description">
                Pilih Kamu Ingin LIhat Piket Di Tanggal Berapa
            </x-slot>

            <div class="space-y-4">
                {{-- Filter Type Selector --}}
                <div class="">
                   
                    <button 
                        wire:click="$set('filterType', 'specific')"
                        style="width: 100%;"
                        @class([
                            'p-4 rounded-lg border-2 transition-all',
                            'border-primary-600 bg-primary-50 dark:bg-primary-950' => $filterType === 'specific',
                            'border-gray-300 hover:border-primary-400 dark:border-gray-600' => $filterType !== 'specific',
                        ])
                    >
                        <div class="flex items-center justify-center gap-2 mb-2">
                            <x-filament::icon 
                                icon="heroicon-o-calendar-days" 
                                class="w-6 h-6 text-primary-600"
                            />
                        </div>
                        <div class="text-sm font-semibold">Tanggal</div>
                        <div class="text-xs text-gray-500 mt-1">Pilih Tanggal</div>
                    </button>
                </div>

                {{-- Date Picker (shown only for specific date) --}}
                @if($filterType === 'specific')
                    <div class="max-w-xs">
                        <x-filament::input.wrapper>
                            <x-filament::input
                                type="date"
                                wire:model.live="selectedDate"
                                class="w-full"
                            />
                        </x-filament::input.wrapper>
                    </div>
                @endif
            </div>
        </x-filament::section>

        {{-- Shift Information --}}
        @if($shiftRecord)
            {{ $this->shiftnightInfolist }}
        @else
            <x-filament::section>
                <div class="text-center py-12">
                    <x-filament::icon 
                        icon="heroicon-o-exclamation-circle" 
                        class="w-12 h-12 text-gray-400 mx-auto mb-4"
                    />
                    <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-300 mb-2">
                        Piket Tidak Ditemukan
                    </h3>
                    <p class="text-sm text-gray-500">
                        @if($filterType === 'specific')
                            Tidak Ada Piket Di Hari Ini.
                        @elseif($filterType === 'next')
                            Tidak Ada Piket Di Hari Ini.
                        @else
                            Tidak Ada Piket Di Hari Ini.
                        @endif
                    </p>
                </div>
            </x-filament::section>
        @endif
    </div>
</x-filament-panels::page>