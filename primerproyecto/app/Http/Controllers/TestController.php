<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class TestController extends Controller
{
   
    public function VisualizarArchivos($nombre)
    {
        $ARCHIVO = storage_path() . '/app/public/' . $nombre . '.pdf';
        return response()->file($ARCHIVO);
    }
}
