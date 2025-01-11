<?php

namespace App\Http\Controllers;

use App\Jobs\DeletePdf;
use App\Jobs\GeneratePdf;
use App\Models\Invoice;
use App\Models\Transaction;

class PdfController extends Controller
{
    public function download($type, $id = null)
    {
        if ($type === 'invoices') {
            $invoices = Invoice::with('customer', 'invoiceItems')->get();
            $data = ['invoices' => json_encode($invoices->toArray())];

            $fileName = 'Invoices.pdf';
            GeneratePdf::dispatchSync($type, null, 'pdf.invoices', $data, $fileName, true);

            $fileUrl = public_path() . "/pdfs/$fileName";
            return response()->download($fileUrl)->deleteFileAfterSend();
        }

        if ($type === 'transactions') {
            $transactions = Transaction::paginate(100);

            $fileName = 'All Transactions.pdf';
            GeneratePdf::dispatchSync($type, null, 'pdf.transactions', ['transactions' => $transactions], $fileName);

            $fileUrl = public_path() . "/pdfs/$fileName";
            return response()->download($fileUrl)->deleteFileAfterSend();
        }

        // Handle single invoice
        if ($type === 'invoice') {

            $isDownload = request()->query('download') === 'true';
            if (!$isDownload) echo 'Generating pdf...';

            $invoice = Invoice::with(['transactions', 'invoiceItems', 'customer'])->where('id', $id)->first();
            if ($invoice) {
                $data = [
                    'invoices' => json_encode([$invoice]),
                    'invoice_id' => $id,
                    'transactions' => $invoice->transactions->toArray(),
                    'customer' => $invoice->customer
                ];

                GeneratePdf::dispatchSync($type, $id, 'pdf.invoice', $data, __('messages.invoice') . $id);

                $fileName = "Invoice$id.pdf";
                $fileUrl = public_path() . "/pdfs/$fileName";

                if ($isDownload) {
                    return response()->download($fileUrl)->deleteFileAfterSend();
                }

                // delete the preview file after 10 minutes
                DeletePdf::dispatch($fileUrl)->delay(now()->addMinutes(10));
                return redirect("/pdfs/$fileName");
            }
        }
    }
}
