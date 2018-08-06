<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\UploadRequest;

use App\Models\PDF;
use App\Jobs\PDFParser;

/**
 * UploadController
 */
class UploadController extends Controller
{
    /**
     * Instances of PDF Model
     *
     * @var {object}
     **/
    private $pdfModel;

    /**
     * UploadController Constructor
     *
     * @param \App\Models\PDF $pdfModel
     * 
     */
    public function __construct(PDF $pdfModel)
    {
        $this->pdfModel = $pdfModel;
    }

    /**
     * Render view for uploading files
     *
     * @return void
     */
    public function index()
    {
        $pdfs = $this->pdfModel->with('uploadedBy')->get();

        return view('layouts.upload-pdf')->with( compact( 'pdfs' ) );
    }

    /**
     *  Upload pdf files
     *
     * @return void
     */
    public function uploadPDF(UploadRequest $request)
    {
        foreach($request->files as $files){

            foreach ($files as $key => $file) {

                $originalFileName = $file->getClientOriginalName();

                $fileName = md5(time().rand(1,99999)).'.pdf';

                $s3 = \Storage::put('pdfs'.'/'.$fileName, file_get_contents($file));

                $pdf = $this->pdfModel->create([
                    'name'              => $fileName,
                    'original_name'     => $originalFileName,
                    'uploaded_by'       => auth()->user()->id
                ]);

                PDFParser::dispatch($pdf);
            }
        }
        
        return redirect()
                    ->back()
                    ->withMessage('Hi '.auth()->user()->name.', Your file has been successfully uploaded in the system.');
    }
}
