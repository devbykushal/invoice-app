@extends('layouts.pdf')

@section('title', __('messages.invoices'))

@section('content')
    <div style="text-align: center;font-size:24px;font-weight:bold;margin-bottom:20px;">
        {{ __('messages.invoices') }}
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

    <div style="clear:both;margin-bottom:10px;"></div>

    <x-invoice-table :invoices="$invoices" class="!shadow-none" noActions allData />
@endsection
