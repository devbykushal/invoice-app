<table {{ $attributes->class(['table-fixed min-w-full border-collapse bg-white shadow-sm', $class ?? '']) }}>
    <thead class="bg-gray-100">
        <tr>
            <th class="border-b px-4 py-4 text-start">{{ __('messages.invoice_id') }}</th>
            <th class="border-b px-4 py-4 text-start">{{ __('messages.invoice_number') }}</th>
            <th class="border-b px-4 py-4 text-start">{{ __('messages.customer_name') }}</th>
            <th class="border-b px-4 py-4 text-start">{{ __('messages.issue_date') }}</th>
            <th class="border-b px-4 py-4 text-start">{{ __('messages.status') }}</th>

            @if (isset($allData))
                <th class="border-b px-4 py-4 text-start">{{ __('messages.due_date') }}</th>
                <th class="border-b px-4 py-4 text-start">{{ __('messages.total_amount') }}</th>
            @endif

            @if (!isset($noActions))
                <th class="border-b px-4 py-4 text-start">{{ __('messages.action') }}</th>
            @endif
        </tr>
    </thead>
    <tbody>
        @php
            $invoices = json_decode($invoices, true);
        @endphp
        @foreach ($invoices as $key => $invoice)
            @php
                $status = $invoice['status'];
                $statusLower = strtolower($status);
            @endphp
            <tr>
                <td class="border-b px-4 py-4">{{ $invoice['id'] }}</td>
                <td class="border-b px-4 py-4">{{ $invoice['invoice_number'] }}</td>
                <td class="border-b px-4 py-4">{{ $invoice['customer']['name'] }}</td>
                <td class="border-b px-4 py-4">{{ $invoice['issue_date'] }}</td>
                <td class="border-b px-4 py-4">
                    @if ($status === 'paid')
                        <span
                            class="inline-block rounded-2xl text-[#27ae60] font-bold border text-sm py-1 px-4 w-[80px] text-center">{{ __("messages.$statusLower") }}</span>
                    @elseif($status === 'pending')
                        <span
                            class="inline-block rounded-2xl text-[#f39c12] font-bold border text-sm py-1 px-4 w-[80px] text-center">{{ __("messages.$statusLower") }}</span>
                    @endif
                </td>

                @if (isset($allData))
                    <td class="border-b px-4 py-4">{{ $invoice['due_date'] }}</td>
                    <td class="border-b px-4 py-4">{{ $invoice['total_amount'] }}</td>
                @endif

                @if (!isset($noActions))
                    <td class="border-b px-4 py-4">
                        <a href="#"
                            class="inline-flex justify-between gap-2 text-sm bg-slate-100 px-4 py-1 rounded-md hover:bg-slate-200 invoice-preview"
                            title="View Invoice" data-id="{{ $invoice['id'] }}">
                            {{ __('messages.view') }}
                            <img class="w-[18px] opacity-70" src="{{ asset('eye.svg') }}" alt="view invoice" />
                        </a>

                        <a href="{{ route('transaction.single', ['invoice_id' => $invoice['id']]) }}"
                            class="inline-flex justify-between gap-2 text-sm bg-zinc-100 px-4 py-1 rounded-md hover:bg-zinc-200"
                            title="View Transactions">
                            {{ __('messages.transactions') }}
                            <img class="w-[18px] opacity-70" src="{{ asset('transaction.svg') }}"
                                alt="view transactions" />
                        </a>

                        <a href="{{ route('downloadPdf', ['type' => 'invoice', 'id' => $invoice['id']]) }}"
                            class="inline-flex justify-between gap-2 text-sm bg-zinc-100 px-4 py-1 rounded-md hover:bg-zinc-200"
                            title="Download Invoice Pdf">
                            {{ __('messages.download') }}
                            <img class="w-[14px] opacity-70" src="{{ asset('pdf.svg') }}" alt="view transactions" />
                        </a>
                    </td>
                @endif
            </tr>
        @endforeach
    </tbody>

</table>
