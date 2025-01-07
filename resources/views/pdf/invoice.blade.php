<html lang="en">

<head>
    <title>{{ __('messages.invoice') }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        * {
            box-sizing: border-box;
        }
    </style>
</head>

<body class="flex px-6 flex-col box-border">

    <div class="flex justify-center align-middle items-center text-3xl font-bold mb-4">{{ __('messages.invoice') }}
        #@php echo $invoice_id; @endphp
    </div>

    <div class="flex justify-between mb-2">
        <div class="font-semibold">
            {{ __('messages.company') }}
        </div>
        <span>{{ __('messages.date') }}: @php
            echo date('m/d/Y');
        @endphp</span>
    </div>


    @php
        $theInvoices = json_decode($invoices, true);
        $invoice = array_filter($theInvoices, function ($invoice) use ($invoice_id) {
            return $invoice['invoice_id'] == $invoice_id;
        });
    @endphp

    <x-invoice-table :invoices="json_encode($invoice, true)" class="!shadow-none" noActions allData />

    <div class="flex justify-between mt-4 mb-2">
        <div class="font-semibold underline">
            {{ __('messages.transaction_history') }}
        </div>
        <span>
            Total: @php echo count(reset($invoice)['transactions']); @endphp
        </span>
    </div>

    <x-transaction-table :invoices="$invoices" :view_invoice_id="$invoice_id" class="!shadow-none" />
</body>

</html>
