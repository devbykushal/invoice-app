{{-- left nav bar --}}
<nav class="flex flex-col bg-white w-[256px] h-[100vh] shadow-sm border-r-[1px] border-[#e7e7e7]">

    <h1 class="text-2xl font-bold mt-2 px-6 py-4 text-[#2C3E50] drop-shadow-lg">{{ __('messages.company') }}</h1>
    <hr>

    {{-- nav items --}}
    @php
        $navItems = [
            ['route' => 'dashboard', 'icon' => 'dash.svg', 'label' => __('messages.dashboard')],
            [
                'route' => 'invoice',
                'icon' => 'invoice.svg',
                'label' => __('messages.invoice'),
                'children' => [
                    ['route' => 'transaction', 'icon' => 'transaction.svg', 'label' => __('messages.transaction')],
                ],
            ],
        ];
    @endphp

    {{-- loop through each nav item --}}
    @foreach ($navItems as $item)
        @if (isset($item['children']))
            <a href="{{ route($item['route']) }}"
                class="flex justify-between gap-1 px-6 py-4 hover:bg-[#f9f9f9] {{ request()->routeIs($item['route']) ? 'bg-[#f9f9f9]' : '' }}"
                id="dropdownToggler">
                <div class="flex gap-1">
                    <img src="{{ asset($item['icon']) }}" class="w-[16px]" />
                    {{ $item['label'] }}
                </div>
                <img src="{{ asset('down.svg') }}" class="w-[16px]" />
            </a>

            {{-- loop through children items (e.g., Transaction) --}}
            @foreach ($item['children'] as $child)
                <a href="{{ route($child['route']) }}"
                    class="flex justify-start gap-1 px-6 py-4 hover:bg-[#f9f9f9] {{ request()->routeIs($child['route']) ? 'bg-[#f9f9f9]' : '' }}"
                    style="{{ request()->routeIs($item['route']) || request()->routeIs($child['route']) ? 'display: flex;' : 'display: none;' }}"
                    id="dropdown">
                    <img src="{{ asset($child['icon']) }}" class="w-[16px]" />
                    {{ $child['label'] }}
                </a>
            @endforeach
        @else
            <a href="{{ route($item['route']) }}"
                class="flex justify-start gap-1 px-6 py-4 hover:bg-[#f9f9f9] {{ request()->routeIs($item['route']) ? 'bg-[#f9f9f9]' : '' }}">
                <img src="{{ asset($item['icon']) }}" class="w-[16px]" />
                {{ $item['label'] }}
            </a>
        @endif
    @endforeach

</nav>
