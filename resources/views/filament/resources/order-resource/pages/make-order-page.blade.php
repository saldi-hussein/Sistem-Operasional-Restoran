<x-filament::page>

    {{-- ================== PILIH MEJA ================== --}}
    @if (!$recordId)
        <div class="mb-4 max-w-sm">
            <label class="block text-sm font-medium text-gray-700 mb-1">
                Nomor Meja <span class="text-danger-600">*</span>
            </label>
            <x-filament::input.wrapper>
                <x-filament::input.select wire:model="tableNumber">
                    <option value="">-- Pilih Meja --</option>

                    <optgroup label="Area A">
                        @for ($i = 1; $i <= 18; $i++)
                            <option value="A{{ $i }}">A{{ $i }}</option>
                        @endfor
                    </optgroup>

                    <optgroup label="Area B">
                        @for ($i = 1; $i <= 6; $i++)
                            <option value="B{{ $i }}">B{{ $i }}</option>
                        @endfor
                    </optgroup>

                    <optgroup label="Area BC">
                        @for ($i = 1; $i <= 6; $i++)
                            <option value="BC{{ $i }}">BC{{ $i }}</option>
                        @endfor
                    </optgroup>

                    <optgroup label="Area C">
                        @for ($i = 1; $i <= 8; $i++)
                            <option value="C{{ $i }}">C{{ $i }}</option>
                        @endfor
                    </optgroup>

                    <optgroup label="Area D">
                        @for ($i = 1; $i <= 8; $i++)
                            <option value="D{{ $i }}">D{{ $i }}</option>
                        @endfor
                    </optgroup>

                </x-filament::input.select>
            </x-filament::input.wrapper>
            @error('tableNumber')
                <p class="text-danger-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
    @endif

    {{-- ================== RINGKASAN ================== --}}
    @php
        $hasSelectedItems = collect($quantities)->filter(fn($q) => $q > 0)->isNotEmpty();
    @endphp

    @if ($hasSelectedItems || !empty($existingOrderItems))
        <div class="mb-4 p-4 bg-gray-50 rounded-lg border">
            <h3 class="text-lg font-semibold text-gray-800 mb-2">Ringkasan Pesanan</h3>

            @if (!empty($existingOrderItems))
                <h4 class="text-sm font-medium text-gray-600 mb-1">Pesanan Saat Ini:</h4>
                @foreach ($existingOrderItems as $item)
                    <div class="flex justify-between text-sm py-1">
                        <span>{{ $item['name'] }}</span>
                        <span>{{ $item['qty'] }}x</span>
                    </div>
                @endforeach
            @endif

            @if ($hasSelectedItems)
                <h4 class="text-sm font-medium text-gray-600 mt-2 mb-1">Pesanan Baru:</h4>
                @foreach ($quantities as $menuId => $qty)
                    @if ($qty > 0)
                        @php $menu = \App\Models\Menu::find($menuId); @endphp
                        @if ($menu)
                            <div class="flex justify-between text-sm py-1">
                                <span>{{ $menu->name }}</span>
                                <span class="font-semibold">{{ $qty }}x</span>
                            </div>
                        @endif
                    @endif
                @endforeach
            @endif
        </div>
    @endif

    {{-- ================== CATATAN ================== --}}
    <div class="mb-4 max-w-lg">
        <label class="block text-sm font-medium text-gray-700 mb-1">Catatan Pesanan</label>
        <textarea
            wire:model="description"
            class="filament-input w-full rounded-md border-gray-300 shadow-sm
                focus:border-primary-500 focus:ring-primary-500 text-sm"
            rows="3"
            placeholder="Contoh: Jangan pedas, atau sambal dipisah..."
        ></textarea>
    </div>

    {{-- ================== TOMBOL SIMPAN ================== --}}
    <div class="mb-6">
        <x-filament::button wire:click="submit" color="success" class="w-full md:w-auto">
            {{ $recordId ? 'Perbarui Pesanan' : 'Simpan Pesanan' }}
        </x-filament::button>
    </div>

    {{-- ================== SEARCH ================== --}}
    <div class="mb-3 max-w-sm flex items-end gap-2">
        <div class="w-full">
            <label class="block text-sm font-medium text-gray-700 mb-1">Cari Menu</label>
            <input
                type="text"
                wire:model="searchQuery"
                wire:keydown.enter="performSearch"
                placeholder="Cari berdasarkan nama menu..."
                class="filament-input w-full rounded-md border-gray-300 shadow-sm
                    focus:border-primary-500 focus:ring-primary-500 text-sm"
            />
        </div>
        <x-filament::button wire:click="performSearch" icon="heroicon-o-magnifying-glass" color="primary">
            Cari
        </x-filament::button>
    </div>

    @error('quantities')
        <p class="text-danger-600 text-sm mt-1 mb-2">{{ $message }}</p>
    @enderror

    {{-- ================== MENU SCROLL ================== --}}
    <div class="border rounded-lg p-3" style="max-height: 430px; overflow-y: auto;">
        @foreach ($this->filteredMenuItems->groupBy('kategori') as $kategori => $items)
            <h2 class="text-md font-bold mb-2 text-gray-700">{{ $kategori }}</h2>
            <div class="grid grid-cols-2 md:grid-cols-3 gap-3 mb-4">
                @foreach ($items as $item)
                    <div class="p-3 border rounded-xl bg-white shadow-sm {{
                        $item->quantity > 0 ? '' : 'opacity-50'
                    }}">
                        @if ($item->image)
                            <img src="{{ asset('storage/' . $item->image) }}"
                                class="w-full h-32 object-cover rounded-md mb-2" />
                        @endif

                        <h3 class="font-bold text-sm text-black">{{ $item->name }}</h3>
                        <p class="text-xs text-gray-500 mb-1">
                            Rp {{ number_format($item->price, 0, ',', '.') }}<br>
                            Stok: {{ $item->quantity }}
                        </p>

                        <div class="mt-2 flex items-center gap-2">
                            <x-filament::button
                                size="sm"
                                wire:click="decreaseItem({{ $item->id }})"
                                icon="heroicon-o-minus"
                                color="gray"
                                :disabled="!isset($quantities[$item->id]) || $quantities[$item->id] <= 0"
                            />
                            <span class="px-2 font-semibold text-sm">
                                {{ $quantities[$item->id] ?? 0 }}
                            </span>
                            <x-filament::button
                                size="sm"
                                wire:click="addItem({{ $item->id }})"
                                icon="heroicon-o-plus"
                                color="primary"
                                :disabled="$item->quantity <= 0"
                            />
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>

</x-filament::page>
