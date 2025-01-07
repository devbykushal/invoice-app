@extends('layouts.app')

@section('topNavTitle', `{{ __('messages.invoice') }}`)

@section('content')
    <div class="flex flex-col overflow-x-auto p-2 shadow-sm">

        <x-table-header />

        <table class="table-fixed min-w-full border-collapse bg-white shadow-sm">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border-b px-4 py-4 text-start">{{ __('messages.invoice_id') }}</th>
                    <th class="border-b px-4 py-4 text-start">{{ __('messages.customer_name') }}</th>
                    <th class="border-b px-4 py-4 text-start">{{ __('messages.invoice_date') }}</th>
                    <th class="border-b px-4 py-4 text-start">{{ __('messages.status') }}</th>
                    <th class="border-b px-4 py-4 text-start">{{ __('messages.action') }}</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $invoices = json_decode($invoices, true);
                @endphp
                @foreach ($invoices as $invoice)
                    @php
                        $status = $invoice['status'];
                        $statusLower = strtolower($status);
                    @endphp
                    <tr>
                        <td class="border-b px-4 py-4">{{ $invoice['invoice_id'] }}</td>
                        <td class="border-b px-4 py-4">{{ $invoice['customer_name'] }}</td>
                        <td class="border-b px-4 py-4">{{ $invoice['invoice_date'] }}</td>
                        <td class="border-b px-4 py-4">
                            @if ($status === 'Paid')
                                <span
                                    class="inline-block rounded-2xl text-[#27ae60] font-bold border text-sm py-1 px-4 w-[80px] text-center">{{ __("messages.$statusLower") }}</span>
                            @elseif($status === 'Partial')
                                <span
                                    class="inline-block rounded-2xl text-[#f39c12] font-bold border text-sm py-1 px-4 w-[80px] text-center">{{ __("messages.$statusLower") }}</span>
                            @else
                                <span
                                    class="inline-block rounded-2xl text-[#e74c3c] font-bold border text-sm py-1 px-4 w-[80px] text-center">{{ __("messages.$statusLower") }}</span>
                            @endif
                        </td>
                        <td class="border-b px-4 py-4">
                            <a href="#"
                                class="inline-flex justify-between gap-2 text-sm bg-slate-100 px-4 py-1 rounded-md hover:bg-slate-200 invoice-preview"
                                title="View Invoice" data-id="{{ $invoice['invoice_id'] }}">
                                {{ __('messages.view') }}
                                <img class="w-[18px] opacity-70" src="{{ asset('eye.svg') }}" alt="view invoice" />
                            </a>

                            <a href="{{ route('transaction') }}/{{ $invoice['invoice_id'] }}"
                                class="inline-flex justify-between gap-2 text-sm bg-zinc-100 px-4 py-1 rounded-md hover:bg-zinc-200"
                                title="View Transactions">
                                {{ __('messages.transaction') }}
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

<div class="absolute bg-[#0000006e] w-full h-full z-50 px-40 py-20" id="modal" style="display:none;">
    <div class="relative bg-white p-10 shadow-lg rounded-lg">
        <div class="absolute right-4 top-1 text-red-700 text-2xl cursor-pointer" id="modalCloser"
            onclick="this.parentNode.parentNode.style.display = 'none';">🗙</div>
        <div class="modal-content" id="modalContent"></div>
    </div>
</div>

<script>
    var invoices = @php echo json_encode($invoices); @endphp;
</script>
