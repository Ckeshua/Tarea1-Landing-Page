<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(){
        return view('login');
    }

    public function intentos(Request $request)
    {   
        
        $nombre = $request->get('email');
        $nombre=substr($nombre,0,strpos($nombre,'.'));
        if(Auth::attempt([

            'email' => $request->email,
            'password' => $request->password . 'salt' 
        ]))
        {
            return redirect('/loged');
        }
        else 
        {
            if(isset($_COOKIE["block".$nombre]))
            {
            $error = "El rut $nombre esta bloqueado por 1 minuto";
            return view('login')->with("error", "$error");
            }
            else 
            {
                if(isset($_COOKIE["$nombre"]))
                {
                    $cont = $_COOKIE["$nombre"];
                    $cont++;
                    echo '$cont';
                    setcookie($nombre, $cont, time() + 120);
                    if($cont >= 3)
                    {
                        setcookie("block".$nombre, $cont, time() + 60);
                        return redirect('/login');
                    }
                    else 
                    {
                        return redirect('/login');
                    }
                }
                else 
                {
                    setcookie($nombre, 1, time() + 120);
                    return redirect('/login');
                }
            }
        } 
    }


    public function CerrarS()
    {
        Auth::logout();
        return redirect()->back();
    }
}