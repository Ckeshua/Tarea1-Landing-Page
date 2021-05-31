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
    $image=$request->get('imgBase64');
    $image = str_replace('data:image/png;base64,', '', $image);
    $image = str_replace(' ', '+', $image);
    $imageName = 'image'.time().'.jpg';
    $path = "../storage/app/public/" . $imageName;  
    file_put_contents($path, base64_decode($image));
    $response = array(
        'status' => 'success',
        'msg' => $request->get('imgBase64'),
        'msg2' => $imageName,
        'msg3' => $path
    );
    return response()->json($response); 
}



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