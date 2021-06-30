<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{
    public function _construct()
    {
        $this->middleware('auth');
    }


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
            'password'=> 'required',
            'cargo'=> 'required'
        ]);

        $user = new User;
        $user->email =$request->email;
        $user->password = bcrypt($request->password . 'salt');
        $user->cargo = $request->cargo;
        $user->assignRole($request->cargo);
        $user->save();
        return redirect()->back()->with('exito', 'El usuario ha sido agregado con exito');  
    }
}
