@extends('layouts.app')

@section('content')
    <div class="flex flex-col overflow-x-auto p-2 shadow-sm">

        <div class="flex justify-between bg-white p-4">
            <div class="relative">
                <input type="text" class="px-4 py-2 border border-zinc-300 rounded-md outline-none" placeholder="Search...">
                <img src="{{ asset('search.svg') }}" alt="search" class="w-[18px] absolute right-2 top-3">
            </div>
            <button class="flex gap-2 items-center shadow-sm px-6 py-2 bg-zinc-200 active:bg-zinc-300">
                <img src="{{ asset('pdf.svg') }}" alt="pdf" class="w-[14px]">
                Download
                <img src="{{ asset('download.svg') }}" alt="pdf" class="w-[16px]">
            </button>
        </div>

        <table class="table-fixed min-w-full border-collapse bg-white shadow-sm">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border-b px-4 py-4 text-start">Invoice ID</th>
                    <th class="border-b px-4 py-4 text-start">Customer Name</th>
                    <th class="border-b px-4 py-4 text-start">Invoice Date</th>
                    <th class="border-b px-4 py-4 text-start">Status</th>
                    <th class="border-b px-4 py-4 text-start">Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $invoices = json_decode($invoices, true);
                @endphp
                @foreach ($invoices as $invoice)
                    <tr>
                        <td class="border-b px-4 py-4">{{ $invoice['invoice_id'] }}</td>
                        <td class="border-b px-4 py-4">{{ $invoice['customer_name'] }}</td>
                        <td class="border-b px-4 py-4">{{ $invoice['invoice_date'] }}</td>
                        <td class="border-b px-4 py-4">
                            @if ($invoice['status'] === 'Paid')
                                <span
                                    class="inline-block rounded-2xl text-[#27ae60] font-bold border text-sm py-1 px-4 w-[80px] text-center">{{ $invoice['status'] }}</span>
                            @elseif($invoice['status'] === 'Partial')
                                <span
                                    class="inline-block rounded-2xl text-[#f39c12] font-bold border text-sm py-1 px-4 w-[80px] text-center">{{ $invoice['status'] }}</span>
                            @else
                                <span
                                    class="inline-block rounded-2xl text-[#e74c3c] font-bold border text-sm py-1 px-4 w-[80px] text-center">{{ $invoice['status'] }}</span>
                            @endif
                        </td>
                        <td class="border-b px-4 py-4">
                            <a href="#"
                                class="inline-flex justify-between gap-2 text-sm bg-slate-100 px-4 py-1 rounded-md hover:bg-slate-200 invoice-preview"
                                title="View Invoice" data-id="{{ $invoice['invoice_id'] }}">
                                View
                                <img class="w-[18px] opacity-70" src="{{ asset('eye.svg') }}" alt="view invoice" />
                            </a>

                            <a href="{{ route('transaction') }}/{{ $invoice['invoice_id'] }}"
                                class="inline-flex justify-between gap-2 text-sm bg-zinc-100 px-4 py-1 rounded-md hover:bg-zinc-200"
                                title="View Transactions">
                                Transactions
                                <img class="w-[18px] opacity-70" src="{{ asset('transaction.svg') }}"
                                    alt="view transactions" />
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

<script>
    var invoices = @php echo json_encode($invoices); @endphp;
</script>
