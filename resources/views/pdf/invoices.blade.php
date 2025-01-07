<html lang="en">

<head>
    <title>{{ __('messages.invoices') }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="flex px-6 pb-8 flex-col">

    <div class="flex justify-center align-middle items-center text-3xl font-bold mb-4">{{ __('messages.invoices') }}
    </div>

    <div class="flex justify-between mb-2">
        <div class="font-semibold">
            {{ __('messages.company') }}
        </div>
        <span>{{ __('messages.date') }}: @php
            echo date('m/d/Y');
        @endphp</span>
    </div>

    <x-invoice-table :invoices="$invoices" class="!shadow-none" noActions allData />

</body>

</html>
