@extends('layouts.app')

@section('topNavTitle', 'Transactions')

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
                    <th class="border-b px-4 py-4 text-start">Transaction ID</th>
                    <th class="border-b px-4 py-4 text-start">Date</th>
                    <th class="border-b px-4 py-4 text-start">Amount</th>
                    <th class="border-b px-4 py-4 text-start">Method</th>
                    <th class="border-b px-4 py-4 text-start">Invoice ID</th>
                </tr>
            </thead>
            @php
                $invoices = json_decode($invoices, true);
                $transactions = [];
                foreach ($invoices as $invoice) {
                    if (isset($view_invoice_id) && intval($view_invoice_id) == intval($invoice['invoice_id'])) {
                        $transaction['invoice_id'] = $view_invoice_id;
                        $view_invoice_transactions = $invoice['transactions'];
                        foreach ($view_invoice_transactions as $transaction) {
                            $transaction['invoice_id'] = $view_invoice_id;
                            $transactions[] = $transaction;
                        }
                        break;
                    }

                    if (empty($view_invoice_id)) {
                        foreach ($invoice['transactions'] as $transaction) {
                            $transaction['invoice_id'] = $invoice['invoice_id'];
                            $transactions[] = $transaction;
                        }
                    }
                }
            @endphp
            <tbody>
                @foreach ($transactions as $transaction)
                    <tr>
                        <td class="border-b px-4 py-4">{{ $transaction['transaction_id'] }}</td>
                        <td class="border-b px-4 py-4">{{ $transaction['date'] }}</td>
                        <td class="border-b px-4 py-4">{{ $transaction['amount'] }}</td>
                        <td class="border-b px-4 py-4">{{ $transaction['method'] }}</td>
                        <td class="border-b px-4 py-4">{{ $transaction['invoice_id'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
