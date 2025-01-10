<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Transaction;

class DashboardController extends Controller
{

    public function index()
    {
        return view('dashboard');
    }

    public function invoice()
    {
        $invoices = Invoice::with('customer', 'invoiceItems')->paginate(10);
        return view('invoice', ['invoices' => json_encode($invoices->toArray()['data']), 'links' => $invoices->links()]);
    }

    public function transaction()
    {
        $transactions = Transaction::paginate(10);
        return view('transaction', ['transactions' => $transactions, 'links' => $transactions->links()]);
    }

    public function viewTransaction($invoice_id)
    {
        $transactions = Transaction::where('invoice_id', $invoice_id)
            ->paginate(10);

        return view('view_transaction', ['transactions' => $transactions, 'links' => $transactions->links()]);
    }

    public function download($type, $id = null)
    {

        if ($type === 'invoices') {
            // return pdf()
            //     ->view("pdf.invoices", ['invoices' => json_encode($this->allData())])
            //     ->footerView('pdf.footer')
            //     ->margins(10, 0, 10, 0)
            //     ->landscape()
            //     ->name('All Invoices.pdf')
            //     ->download();
        }

        if ($type === 'transactions') {
            // return pdf()
            //     ->view("pdf.transactions", ['invoices' => json_encode($this->allData())])
            //     ->footerView('pdf.footer')
            //     ->margins(10, 0, 10, 0)
            //     ->landscape()
            //     ->name('All Transactions.pdf')
            //     ->download();
        }

        if ($type === 'invoice') {
            // return pdf()
            //     ->view("pdf.invoice", ['invoices' => json_encode($this->allData()), 'invoice_id' => $id])
            //     ->footerView('pdf.footer')
            //     ->margins(10, 0, 10, 0)
            //     ->landscape()
            //     ->name("Invoice#$id.pdf")
            //     ->download();
        }
    }
}
