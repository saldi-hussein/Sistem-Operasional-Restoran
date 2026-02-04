<x-filament::widget>
    <style>
        .menu-grid {
            display: grid;
            gap: 1rem;
            grid-template-columns: auto auto;
            margin-left: -20px;
        }

        .menu-card {
            display: block;
            text-align: center;
            background: white;
            border-radius: 12px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.08);
            padding: 1rem;
            text-decoration: none;
            color: #333;
            transition: all 0.3s ease;
        }

        .menu-card:hover {
            background: #ffa500;
            color: white;
        }

        .menu-card:hover .menu-icon {
            color: white !important;
        }

        /* Active State */
        .menu-card.active {
            background: #ffa500;
            color: white;
        }

        .menu-card.active .menu-icon {
            color: white !important;
        }

        .menu-icon {
            width: 80px;
            height: 80px;
            color: #ffa500;
            margin: 0 auto 10px;
            display: block;
        }

        .menu-title {
            font-size: 12px;
            font-weight: 600;
            margin: 0;
        }
    </style>

    <div class="menu-grid">
        @foreach ($this->getItems() as $item)
            <a href="{{ $item['link'] }}"
               class="menu-card {{ request()->routeIs($item['active_route']) ? 'active' : '' }}">
                <x-filament::icon :icon="$item['icon']" class="menu-icon" />
                <div class="menu-title">{{ $item['title'] }}</div>
            </a>
        @endforeach
    </div>
</x-filament::widget>