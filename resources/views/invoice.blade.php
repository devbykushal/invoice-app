@extends('layouts.app')

@section('topNavTitle', __('messages.invoices'))

@section('content')
    <div class="flex flex-col overflow-x-auto p-2 shadow-sm">

        <x-table-header pdfDownloadHref="/pdf/invoices" />

        <x-invoice-table :invoices="$invoices" />
    </div>
@endsection

<div class="absolute bg-[#0000006e] w-full h-full z-50 px-40 py-20" id="modal" style="display:none;">
    <div class="relative bg-white p-10 shadow-lg rounded-lg">
        <div class="absolute right-4 top-1 text-red-700 text-2xl cursor-pointer" id="modalCloser"
            onclick="this.parentNode.parentNode.style.display = 'none';">🗙</div>
        <div class="modal-content" id="modalContent"></div>
    </div>
</div>

<script>
    var invoices = {!! $invoices !!};
</script>
