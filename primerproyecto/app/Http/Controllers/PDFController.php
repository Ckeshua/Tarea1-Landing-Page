<?php

namespace App\Http\Controllers;

  

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
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


    public function filtrar()
    {
        if(isset($_REQUEST["filter"])) {
            $filter = $_REQUEST["filter"];
            $NOMBRE_ARCHIVOS = array();
            $ARCHIVOS = File::files(storage_path() . '\app'.'\public'); //REMPLAZA \test por la carpeta que tiene los archivos que necesitas mostrar
            foreach ($ARCHIVOS as $DIRECTORIO) {
                $ARCHIVO = pathinfo($DIRECTORIO);
                if(strpos($ARCHIVO['filename'], $_REQUEST['filter']) !== false){
                    array_push($NOMBRE_ARCHIVOS, $ARCHIVO['filename']);
                }
            }
        }
        return view('parte3', compact('NOMBRE_ARCHIVOS'));
    }

    public function generatePDF()

    {
        
        if(isset($_GET["contrato"])){
            $name = $_GET["contrato"];
            $data = ['title' => 'Welcome to PDF'];

            $pdf = PDF::loadView('myPDF', $data);
            Storage::put($name.time().'.pdf', $pdf->output());

            $dir = new \DirectoryIterator(dirname('../storage/imgs/yareyare.jpg'));
            $file_names = array();
            foreach ($dir as $fileinfo){
                if (!$fileinfo->isDot()) {
                    $filename = $fileinfo->getFilename();
                    $delete_path = "../storage/imgs/$filename";
                    unlink($delete_path);
                }
            }
            $NOMBRE_ARCHIVOS = array();

            $ARCHIVOS = File::files(storage_path() . '\app'.'\public'); //REMPLAZA \test por la carpeta que tiene los archivos que necesitas mostrar
            foreach ($ARCHIVOS as $DIRECTORIO) {
                
                $ARCHIVO = pathinfo($DIRECTORIO);
                array_push($NOMBRE_ARCHIVOS, $ARCHIVO['filename']);
            }
            return view('parte3', compact('NOMBRE_ARCHIVOS'));
        }
        else {
            
            $NOMBRE_ARCHIVOS = array();

            $ARCHIVOS = File::files(storage_path() . '\app'.'\public'); //REMPLAZA \test por la carpeta que tiene los archivos que necesitas mostrar
            foreach ($ARCHIVOS as $DIRECTORIO) {
                $ARCHIVO = pathinfo($DIRECTORIO);
                array_push($NOMBRE_ARCHIVOS, $ARCHIVO['filename']);
            }
            return view('parte3', compact('NOMBRE_ARCHIVOS'));
        }
}

}