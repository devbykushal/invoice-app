<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Transaction;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\App;

class PdfController extends Controller
{
    protected function generatePdf($bladeView, $bladeViewData, $name, $download = false)
    {
        // Load the initial view with a placeholder for total pages
        $pdf = Pdf::loadView($bladeView, $bladeViewData, [], 'UTF-8');
        $pdf->setPaper('A4', 'Landscape');

        // Render the PDF to count pages
        $dompdf = $pdf->getDomPDF();
        if (App::getLocale() == 'jp') {
            $dompdf->getOptions()->set('defaultFont', 'ipaexg');
        }
        $dompdf->render();
        $totalPages = $dompdf->getCanvas()->get_page_count();

        // Replace the placeholder with the actual total pages
        $html = str_replace('[[total_pages]]', $totalPages, view($bladeView, $bladeViewData)->render());

        $finalPdf = Pdf::loadHTML($html, 'UTF-8');
        $finalPdf->setPaper('A4', 'Landscape');
        $finalPdf->setOption('defaultFont', 'ipaexg');

        if ($download) return $finalPdf->download($name);
        return $finalPdf->stream($name);
    }

    public function download($type, $id = null)
    {
        if ($type === 'invoices') {
            $invoices = Invoice::with('customer', 'invoiceItems')->get();
            $data = ['invoices' => json_encode($invoices->toArray())];
            return $this->generatePdf('pdf.invoices', $data, 'All Invoices.pdf', true);
        }

        if ($type === 'transactions') {
            $transactions = Transaction::paginate(100);
            return $this->generatePdf('pdf.transactions', ['transactions' => $transactions], 'All Transactions.pdf', true);
        }

        if ($type === 'invoice') {
            $isDownload = request()->query('download') === 'true';
            $invoice = Invoice::with(['transactions', 'invoiceItems', 'customer'])->where('id', $id)->first();
            if ($invoice) {
                return $this->generatePdf('pdf.invoice', ['invoices' => json_encode([$invoice]), 'invoice_id' => $id, 'transactions' => $invoice->transactions->toArray(), 'customer' => $invoice->customer], __('messages.invoice') . $id, $isDownload);
            }
        }
    }
}
