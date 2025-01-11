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
}
