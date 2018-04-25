<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Redirect;
class UsuariosController extends Controller
{
    public function usuarios_index(){
        $usuario = User::get();
        return view('usuarios.usuarios',['usuario' => $usuario]);
    }
    public function login(Request $request){

        $nome = $request->input('name');
        $email = $request->input('emailinput');
        $senha = Hash::make($request->input('senhainput')); //já faz a hash bcrypt

        $usuario = new User();
        $usuario->fill(
            [
                'name' => $nome,
                'email' => $email,
                'password' => $senha
            ]);
        $usuario->save();
        \Session::flash('mensagem_sucesso_usuario', 'Administrador cadastrado com sucesso!');
        return Redirect::to('/usuarios');
    }
}
