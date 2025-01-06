@extends('layouts.app')

@section('content')
    <h1>Invoices List</h1>
    <table class="table-auto">
        <thead>
            <tr>
                <th>Invoice Number</th>
                <th>Date</th>
                <th>Customer</th>
                <th>Subtotal</th>
                <th>Tax</th>
                <th>Total</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @php
                $invoices = json_decode($invoicesJson);
            @endphp
            @foreach ($invoices as $invoice)
                <tr>
                    <td>{{ $invoice->invoice_number }}</td>
                    <td>{{ $invoice->date }}</td>
                    <td>{{ $invoice->customer->name }}</td>
                    <td>{{ number_format($invoice->subtotal, 2) }}</td>
                    <td>{{ number_format($invoice->tax, 2) }}</td>
                    <td>{{ number_format($invoice->total, 2) }}</td>
                    <td>{{ $invoice->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
