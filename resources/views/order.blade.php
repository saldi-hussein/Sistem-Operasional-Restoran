<div class="grid grid-cols-1 md:grid-cols-3 gap-4" x-data="{ cart: {} }">
    @foreach ($menus as $menu)
        <div class="p-4 border rounded shadow">
            <img src="{{ asset('storage/' . $menu->image) }}" class="w-full h-40 object-cover rounded" alt="{{ $menu->name }}">
            <h2 class="text-lg font-bold mt-2">{{ $menu->name }}</h2>
            <p class="text-green-600 font-semibold">Rp {{ number_format($menu->price, 0, ',', '.') }}</p>

            <div class="flex items-center mt-2 space-x-2">
                <button @click="cart[{{ $menu->id }}] = Math.max((cart[{{ $menu->id }}] || 0) - 1, 0)"
                    class="px-2 py-1 bg-gray-300 rounded">−</button>

                <span x-text="cart[{{ $menu->id }}] || 0"></span>

                <button @click="cart[{{ $menu->id }}] = (cart[{{ $menu->id }}] || 0) + 1"
                    class="px-2 py-1 bg-gray-300 rounded">+</button>
            </div>
        </div>
    @endforeach
</div>