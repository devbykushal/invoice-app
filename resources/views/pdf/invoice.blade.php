@extends('layouts.pdf')

@section('title', __('messages.invoice'))

@section('content')
    <div style="text-align: center;font-size:24px;font-weight:bold;margin-bottom:20px;">{{ __('messages.invoice') }}
        #@php echo $invoice_id; @endphp
    </div>

    <div>
        <div style="display:block;float:left;width:50%;font-weight: 600;">
            {{ __('messages.company') }}
        </div>
        <div style="display:block;float:left;width:50%;font-weight: 600;text-align:right;">{{ __('messages.date') }}:
            @php
                echo date('m/d/Y');
            @endphp</div>
    </div>

    <div style="clear: both;"></div>
    <hr>


    <div style="font-size: 18px;font-weight:bold;margin-bottom:5px;margin-top:10px;">
        {{ __('messages.customer') }}
    </div>

    <table style="margin:0 0 20px 0;">
        <thead class="bg-gray-100">
            <tr>
                <th class="border-b px-4 py-4 text-start">{{ __('messages.customer_id') }}</th>
                <th class="border-b px-4 py-4 text-start">{{ __('messages.customer_name') }}</th>
                <th class="border-b px-4 py-4 text-start">{{ __('messages.customer_email') }}</th>
                <th class="border-b px-4 py-4 text-start">{{ __('messages.customer_phone') }}</th>
                <th class="border-b px-4 py-4 text-start">{{ __('messages.customer_address') }}</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="border-b px-4 py-4">{{ $customer->id }}</td>
                <td class="border-b px-4 py-4">{{ $customer->name }}</td>
                <td class="border-b px-4 py-4"><a href="mailto:{{ $customer->email }}">{{ $customer->email }}</a></td>
                <td class="border-b px-4 py-4">{{ $customer->phone }}</td>
                <td class="border-b px-4 py-4">{{ $customer->address }}</td>
            </tr>
        </tbody>
    </table>

    <div style="font-size: 18px;font-weight:bold;margin-bottom:5px;">
        {{ __('messages.invoice') }}
    </div>

    <x-invoice-table :invoices="$invoices" class="!shadow-none" noActions allData />

    <div style="margin-top: 20px;">
        <div style="font-size: 18px;font-weight:bold;margin-bottom:5px;">
            {{ __('messages.transaction_history') }}
        </div>
    </div>

    <x-transaction-table :transactions="$transactions" class="!shadow-none" />
@endsection
