<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
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
    $image = ImageManager::make($request->get('imgBase64'));
    $image->save('public/bar.jpg');

    return redirect('/');
}



    public function generatePDF()

    {

        $data = ['title' => 'Welcome to PDF'];

        $pdf = PDF::loadView('myPDF', $data);


        return $pdf->download('documento_escaneado.pdf');

    }

}