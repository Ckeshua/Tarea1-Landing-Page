<?php

namespace App\Http\Controllers;

  

use Illuminate\Http\Request;

use PDF;

  

class PDFController extends Controller

{

    /**

     * Display a listing of the resource.

     *

     *@return \Illuminate\Http\Response

     */

    public function generatePDF()

    {

        $data = ['title' => 'Welcome to PDF'];

        $pdf = PDF::loadView('myPDF', $data);
        
        $pdf_download = $pdf->download('documento_escaneado.pdf');

        $dir = new \DirectoryIterator(dirname('../storage/app/public/yareyare.jpg'));
        $file_names = array();
        foreach ($dir as $fileinfo){
            if (!$fileinfo->isDot()) {
                $filename = $fileinfo->getFilename();
                $delete_path = "../storage/app/public/$filename";
                unlink($delete_path);
            }
        }
        return $pdf_download;
    }

}