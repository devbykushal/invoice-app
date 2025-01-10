@extends('layouts.app')

@section('topNavTitle', __('messages.transactions'))

@section('content')
    <div class="flex flex-col overflow-x-auto p-2 shadow-sm">
        <x-table-header />
        <x-transaction-table :transactions="$transactions" />

        <div class="mt-2 mb-2">
            @php
                echo $links;
            @endphp
        </div>

    </div>
@endsection
