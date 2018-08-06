<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PDFParsedContent;

/**
 * PDFController
 */
class PDFController extends Controller
{
    /**
     * Instances of PDFParsedContent Model
     *
     * @var {object}
     **/
    private $pdfParsedContentModel;

    /**
     * PDFController Constructor
     *
     * @param \App\Models\PDFParsedContent $pdfParsedContentModel
     * 
     */
    public function __construct(PDFParsedContent $pdfParsedContentModel)
    {
        $this->pdfParsedContentModel = $pdfParsedContentModel;
    }

    /**
     * Get all pages of given PDF
     *
     * @return void
     */
    public function getAllPDFPages($id)
    {
        $pdf = $this->pdfParsedContentModel->with('pdfDetail')->where('pdf_id',$id)->get();

        return response()->json(
                $pdf->toArray()
        );
    }

    /**
     * Get specific page of given PDF
     *
     * @return void
     */
    public function getSpecificPDFPages($id, $page_no)
    {
        $pdf_page = $this->pdfParsedContentModel->with('pdfDetail')->where('pdf_id',$id)->where('page_no',$page_no)->get();

        return response()->json(
                $pdf_page->toArray()
        );
    }

    /**
     * Get PDF by word
     *
     * @return void
     */
    public function getPDFByWord($search)
    {
        $pdf_page = $this->pdfParsedContentModel->with('pdfDetail')->where('content','like', '%'.$search.'%')->get();

        return response()->json(
                $pdf_page->toArray()
        );
    }
}
