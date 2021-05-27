<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function showUsers($id){
        $users = User::findorFail($id);
        dd($users);
    }
    public function CrearUsuario(){

        return view('CrearUsuario');
    }
    public function GuardarUsuario(Request $request){

        $request ->validate([
            'email'=>'required|email',
            'password'=> 'required'
        ]);


        $user = new User;
        $user->email =$request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect()->back()->with('exito', 'El usuario ha sido agregado con exito');  
    }
}
