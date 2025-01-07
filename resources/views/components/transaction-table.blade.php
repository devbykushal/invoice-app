@props(['invoices', 'view_invoice_id', 'class' => ''])

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
                @php
                    $method = str_replace(' ', '_', strtolower($transaction['method']));
                @endphp
                <td class="border-b px-4 py-4">{{ $transaction['transaction_id'] }}</td>
                <td class="border-b px-4 py-4">{{ $transaction['date'] }}</td>
                <td class="border-b px-4 py-4">{{ $transaction['amount'] }}</td>
                <td class="border-b px-4 py-4">{{ __("messages.$method") }}</td>
                <td class="border-b px-4 py-4">{{ $transaction['invoice_id'] }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
