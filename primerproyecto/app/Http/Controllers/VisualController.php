<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VisualController extends Controller
{
    public function show(){
        $directories = Storage::directories('/PDF');
        $directories = Storage::allDirectories('/PDF');
        return view('',compact('directories'));
    }
}
