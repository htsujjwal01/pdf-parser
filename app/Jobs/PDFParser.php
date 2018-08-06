<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

use App\Models\PDF;
use App\Models\PDFParsedContent;

class PDFParser implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $pdf;
    protected $pdfParsedContentModel;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($pdf){
        $this->pdf     = $pdf;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $parser = new \Smalot\PdfParser\Parser();
        $pdf    = $parser->parseFile(storage_path('app/pdfs/'.$this->pdf->name));

        $pages  = $pdf->getPages();

        // Loop over each page to extract text.
        foreach ($pages as $key => $page) {

            PDFParsedContent::create([
                    'pdf_id'            => $this->pdf->id,
                    'page_no'           => ($key + 1),
                    'content'           => $page->getText()
                ]);
        }
    }
}
