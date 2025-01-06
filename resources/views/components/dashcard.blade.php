<div class="flex flex-col justify-center items-center align-middle text-center gap-4 bg-white p-6 shadow-sm">
    <div class="{{ $bg ?? 'bg-sky-200' }} rounded-full w-[100px] p-6">
        <img src="{{ $img ?? asset('down.svg') }}" alt="image" class="w-[60px] object-contain">
    </div>
    <div class="flex flex-col">
        <div class="title text-sm capitalize font-semibold drop-shadow-sm text-[#7c7c7c]">{{ $title ?? 'N/A' }}
        </div>
        <div class="value text-4xl font-semibold text-blue-950">{{ $value ?? 0 }}</div>
    </div>
</div>
