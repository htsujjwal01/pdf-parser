<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

/**
 * HomeController
 */
class HomeController extends Controller
{

    /**
     * Get dashboard view
     *
     * @return void
     */
    public function index()
    {
    	dd("heelo ujjwal");
        return view('welcome');
    }

    /**
     * Render view to upload pdf files
     *
     * @return void
     */
    public function uploadPDF()
    {
    	dd("upload pdf");
        return view('welcome');
    }
}
