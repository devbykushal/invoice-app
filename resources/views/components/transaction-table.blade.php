@props(['transactions', 'class' => ''])

<table {{ $attributes->class(['table-fixed min-w-full border-collapse bg-white shadow-sm', $class ?? '']) }}>
    <thead class="bg-gray-100">
        <tr>
            <th class="border-b px-4 py-4 text-start">{{ __('messages.transaction_id') }}</th>
            <th class="border-b px-4 py-4 text-start">{{ __('messages.date') }}</th>
            <th class="border-b px-4 py-4 text-start">{{ __('messages.amount') }}</th>
            <th class="border-b px-4 py-4 text-start">{{ __('messages.method') }}</th>
            <th class="border-b px-4 py-4 text-start">{{ __('messages.invoice_id') }}</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($transactions as $transaction)
            <tr>
                @php
                    $method = str_replace(' ', '_', strtolower($transaction['payment_method']));
                @endphp
                <td class="border-b px-4 py-4">{{ $transaction['id'] }}</td>
                <td class="border-b px-4 py-4">{{ $transaction['payment_date'] }}</td>
                <td class="border-b px-4 py-4">{{ $transaction['payment_amount'] }}</td>
                <td class="border-b px-4 py-4">{{ __("messages.$method") }}</td>
                <td class="border-b px-4 py-4">{{ $transaction['invoice_id'] }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
