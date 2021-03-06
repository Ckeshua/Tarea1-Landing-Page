<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function login(){
        return redirect('/home');
    }

    public function intentos(Request $request)
    {   
        
        $nombre = $request->get('email');
        $nombre=substr($nombre,0,strpos($nombre,'.'));
        
        if(isset($_COOKIE["block".$nombre]))
        {
            $error = "El rut $nombre esta bloqueado por 1 minuto";
            return view('welcome')->with("error", "$error");
        }
        else 
        {
            if(Auth::attempt([

                'email' => $request->email,
                'password' => $request->password . 'salt' 
            ]))
            {
                return redirect('/home');
            }
            if(isset($_COOKIE["$nombre"]))
            {
                $cont = $_COOKIE["$nombre"];
                $cont++;
                setcookie($nombre, $cont, time() + 120);
                if($cont >= 3)
                {
                    setcookie("block".$nombre, $cont, time() + 60);
                    
                }
                else 
                {
                    return redirect('/home');
                }
            }
            else 
            {
                setcookie($nombre, 1, time() + 120);
                return redirect('/home');
            }
        }
    } 
    


    public function CerrarS()
    {
        Auth::logout();
        return redirect()->back();
    }
}