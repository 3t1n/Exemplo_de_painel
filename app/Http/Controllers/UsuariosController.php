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



        //faz as validações
        $this->validate($request,[
            'nome' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ],[
            'email.unique' => 'O email já está cadastrado!',
            'nome.required' => 'O nome é requerido',
            'email.required' => 'O email é requerido',
            'password.required' => 'A senha é requerida',
            'password.min' => 'A senha deve ter no mínimo 6 caracteres',
        ]);

        $nome = $request->input('nome');
        $email = $request->input('email');
        $senha = Hash::make($request->input('password')); //já faz a hash bcrypt

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
    public function deletar($id){
        $usuario = User::findOrFail($id);
        $usuario->delete();
        \Session::flash('mensagem_sucesso_vendedor', 'Administrador deletado com sucesso!');
        return Redirect::to('usuarios');
    }
}
