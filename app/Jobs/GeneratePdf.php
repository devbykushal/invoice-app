<?php

namespace App\Jobs;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class GeneratePdf implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $type;
    protected $id;
    protected $bladeView;
    protected $bladeViewData;
    protected $name;

    public function __construct($type, $id, $bladeView, $bladeViewData, $name)
    {
        $this->type = $type;
        $this->id = $id;
        $this->bladeView = $bladeView;
        $this->bladeViewData = $bladeViewData;
        $this->name = $name;
    }

    public function handle()
    {
        try {
            $pdf = Pdf::loadView($this->bladeView, $this->bladeViewData, [], 'UTF-8');
            $pdf->setPaper('A4', 'Landscape');

            // Render the PDF to count pages
            $dompdf = $pdf->getDomPDF();
            if (App::getLocale() == 'jp') {
                $dompdf->getOptions()->set('defaultFont', 'ipaexg');
            }
            $dompdf->render();
            $totalPages = $dompdf->getCanvas()->get_page_count();

            // Replace the placeholder with the actual total pages
            $html = str_replace('[[total_pages]]', $totalPages, view($this->bladeView, $this->bladeViewData)->render());

            $finalPdf = Pdf::loadHTML($html, 'UTF-8');
            $finalPdf->setPaper('A4', 'Landscape');
            $finalPdf->setOption('defaultFont', 'ipaexg');

            $this->name = str_replace('.pdf', '', $this->name);
            $filePath = public_path('pdfs/' . $this->name . '.pdf');

            if (!is_dir(public_path('pdfs'))) {
                mkdir(public_path('pdfs'), 0755, true);
            }

            // Save the PDF to the public directory
            file_put_contents($filePath, $finalPdf->output());
        } catch (\Exception $e) {
            Log::error('PDF generation failed: ' . $e->getMessage());
            throw $e;
        }
    }
}
