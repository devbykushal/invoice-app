@extends('layouts.app')

@section('topNavTitle', __('messages.transactions'))

@section('content')
    <div class="flex flex-col overflow-x-auto p-2 shadow-sm">

        @if (isset($view_invoice_id))
            <x-table-header />
            <x-transaction-table :invoices="$invoices" :view_invoice_id="$view_invoice_id" />
        @else
            <x-table-header pdfDownloadHref="/pdf/transactions" />
            <x-transaction-table :invoices="$invoices" />
        @endif


    </div>
@endsection
