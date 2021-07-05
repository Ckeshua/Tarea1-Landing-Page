<?php

namespace App\Http\Controllers;

  

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use PDF;
use SebastianBergmann\Environment\Console;
use App\Models\Archivos;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;

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
            $name_arch = $_REQUEST['filter'];
            $arch_db = DB::select("select Nombre_Arch from archivos where tipode = ? ", [$name_arch]);
            
            for($i = 0; $i < count($arch_db); $i++) {
                //$ARCHIVO = pathinfo($DIRECTORIO);
                $arch_db_seguridad = DB::select("select seguridad from archivos where Nombre_Arch= ? ", [$arch_db[$i]->Nombre_Arch]);
                if(Auth()->user()->can('Seguridad nivel 1') && $arch_db_seguridad[0]->seguridad=='Seguridad nivel 1'){
                    array_push($NOMBRE_ARCHIVOS, $arch_db[$i]->Nombre_Arch);
                }
                elseif(Auth()->user()->can('Seguridad nivel 2') && $arch_db_seguridad[0]->seguridad=='Seguridad nivel 2'){
                    array_push($NOMBRE_ARCHIVOS, $arch_db[$i]->Nombre_Arch);
                }
                elseif(Auth()->user()->can('Seguridad nivel 3') && $arch_db_seguridad[0]->seguridad=='Seguridad nivel 3'){
                    array_push($NOMBRE_ARCHIVOS, $arch_db[$i]->Nombre_Arch);
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
            $archivo= new Archivos;

            $archivo->seguridad = $_GET["seguridad"];
            $archivo->tipode = $_GET["Tipode"];
            
            $pdf = PDF::loadView('myPDF', $data);
            $name = $name.time();
            $archivo->Nombre_Arch = $name;
            $archivo->save();
            Storage::put($name.'.pdf', $pdf->output());
            
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
                $ARCHIVO = $ARCHIVO['filename'];
                $arch_db = DB::select("select seguridad from archivos where Nombre_Arch= ? ", [$ARCHIVO]);
                if(Auth()->user()->can('Seguridad nivel 1') && $arch_db[0]->seguridad=='Seguridad nivel 1'){
                    array_push($NOMBRE_ARCHIVOS, $ARCHIVO);
                }
                elseif(Auth()->user()->can('Seguridad nivel 2') && $arch_db[0]->seguridad=='Seguridad nivel 2'){
                    array_push($NOMBRE_ARCHIVOS, $ARCHIVO);
                }
                elseif(Auth()->user()->can('Seguridad nivel 3') && $arch_db[0]->seguridad=='Seguridad nivel 3'){
                    array_push($NOMBRE_ARCHIVOS, $ARCHIVO);
                }
                
            }
            return view('parte3', compact('NOMBRE_ARCHIVOS'));
        }
}

}