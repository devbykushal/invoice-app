<div class="flex justify-between bg-white p-4">
    <div class="relative">
        <input type="text" class="px-4 py-2 border border-zinc-300 rounded-md outline-none"
            placeholder="{{ __('messages.search') }}...">
        <img src="{{ asset('search.svg') }}" alt="search" class="w-[18px] absolute right-2 top-3">
    </div>
    @if (isset($pdfDownloadHref))
        <a href="{{ $pdfDownloadHref }}"
            class="flex gap-2 items-center shadow-sm px-6 py-2 bg-zinc-200 active:bg-zinc-300">
            <img src="{{ asset('pdf.svg') }}" alt="pdf" class="w-[14px]">
            {{ __('messages.download') }}
            <img src="{{ asset('download.svg') }}" alt="pdf" class="w-[16px]">
        </a>
    @endif

</div>
