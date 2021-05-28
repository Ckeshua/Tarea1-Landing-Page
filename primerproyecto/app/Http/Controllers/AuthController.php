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
        
        /* $nombre = request('email'); */
        dd(Auth::attempt([

            'email' => $request->email,
            'password' => $request->password 
        ]));
        
        /* else {if(isset($_COOKIE["block".$nombre])){
            $error = "El rut $nombre esta bloqueado por 1 minuto";
            return view('login')->with("error", "$error");
        }
            else {
                if(isset($_COOKIE["$nombre"])){
                    $cont = $_COOKIE["$nombre"];
                    $cont++;
                    setcookie($nombre, $cont, time() + 120);
                    if($cont >= 3){
                        setcookie("block".$nombre, $cont, time() + 60);
                        return redirect('/');
                    }
                    else {
                        return redirect('/');
                    }
                }
                else {
                    setcookie($nombre, 1, time() + 120);
                    return redirect('/');
                }
            }*/
        } 
    }
