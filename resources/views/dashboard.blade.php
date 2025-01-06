@extends('layouts.app')

@section('content')
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-2 p-2">
        <x-dashcard img="sales.svg" value="10K+" title="{{ __('messages.total_income') }}" />
        <x-dashcard img="customers.svg" value="100+" title="{{ __('messages.total_customers') }}" bg="bg-purple-200" />
        <x-dashcard img="reviews.svg" value="3K+" title="{{ __('messages.total_reviews') }}" bg="bg-indigo-200" />
        <x-dashcard img="refunds.svg" value="100+" title="{{ __('messages.pending_refunds') }}" bg="bg-rose-200" />
    </div>
@endsection
