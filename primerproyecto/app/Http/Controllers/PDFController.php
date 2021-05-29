<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Storage;
use PDF;

  

class PDFController extends Controller

{

    /**

     * Display a listing of the resource.

     *

     *@return \Illuminate\Http\Response

     */
    public function iniciopdf(){
        return view ('Tomarfoto');
    }


    public function guardarimg(Request $request)
{
    $response = array(
        'status' => 'success',
        'msg' => $request->get('imgBase64'),
    );
    return response()->json($response); 
}



    public function generatePDF()

    {

        $data = ['title' => 'Welcome to PDF'];

        $pdf = PDF::loadView('myPDF', $data);


        return $pdf->download('documento_escaneado.pdf');

    }

}