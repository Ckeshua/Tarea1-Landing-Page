<?php

namespace App\Http\Controllers;

  

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Storage;
use PDF;
use SebastianBergmann\Environment\Console;

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
    $image=$request->get('imgBase64');
    $image = str_replace('data:image/png;base64,', '', $image);
    $image = str_replace(' ', '+', $image);
    $imageName = 'image'.time().'.jpg';
    $path = "../storage/imgs/" . $imageName;  
    file_put_contents($path, base64_decode($image));
    $response = array(
        'status' => 'success',
        'msg' => $request->get('imgBase64'),
        'msg2' => $imageName,
        'msg3' => $path
    );
    return response()->json($response); 
}

    public function eliminarimg(Request $request)
{
    $path = $request->get('path');
    unlink($path);
    $response = array(
        'status' => 'success'
    );
    return response()->json($response);
}


    public function generatePDF()

    {

        $data = ['title' => 'Welcome to PDF'];

        $pdf = PDF::loadView('myPDF', $data);
        
        Storage::put('_'.time().'.pdf', $pdf->output());

        $pdf_download = $pdf->download('documento_escaneado.pdf');

        $dir = new \DirectoryIterator(dirname('../storage/imgs/yareyare.jpg'));
        $file_names = array();
        foreach ($dir as $fileinfo){
            if (!$fileinfo->isDot()) {
                $filename = $fileinfo->getFilename();
                $delete_path = "../storage/imgs/$filename";
                unlink($delete_path);
            }
        }
        return view('home');
    }

}