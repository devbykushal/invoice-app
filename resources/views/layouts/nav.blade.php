{{-- left nav bar --}}
<nav class="flex flex-col bg-white w-[256px] h-screen shadow-sm border-r-[1px] border-[#e7e7e7]">

    <h1 class="text-xl font-extrabold mt-2 px-6 py-4 text-[#3498db]">NexGen Solutions</h1>
    <hr>
    <a href="{{ route('dashboard') }}"
        class="flex justify-start gap-1 px-6 py-4 hover:bg-[#f9f9f9] {{ request()->routeIs('dashboard') ? 'bg-[#f9f9f9]' : '' }}">
        <img src="{{ asset('dash.svg') }}" class="w-[16px]" />
        Dashboard
    </a>

    <a href="{{ route('invoice') }}"
        class="flex justify-between gap-1 px-6 py-4 hover:bg-[#f9f9f9] {{ request()->routeIs('invoice') ? 'bg-[#f9f9f9]' : '' }}"
        id="dropdownToggler">
        <div class="flex gap-1">
            <img src="{{ asset('invoice.svg') }}" class="w-[16px]" />
            Invoice
        </div>
        <img src="{{ asset('down.svg') }}" class="w-[16px]" />
    </a>

    <a href="{{ route('transaction') }}"
        class="flex justify-start gap-1 px-6 py-4 hover:bg-[#f9f9f9] {{ request()->routeIs('transaction') ? 'bg-[#f9f9f9]' : '' }}"
        style="{{ request()->routeIs('invoice') || request()->routeIs('transaction') ? 'display: flex;' : 'display: none;' }}"
        id="dropdown">
        <img src="{{ asset('transaction.svg') }}" class="w-[16px]" />
        Transaction
    </a>

</nav>
