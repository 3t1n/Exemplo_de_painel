<?php

namespace App\Http\Controllers;

use App\Vendedores;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Redirect;



class VendedoresController extends Controller
{
    public function vendedores_index(){
        $vendedores = Vendedores::get();
        return view('vendedores.vendedores',['vendedores' => $vendedores]);
    }
    public function registrar(Request $request){

        //faz as validações
        $this->validate($request,[
            'nome' => 'required|max:255',
            'email' => 'required|email|unique:vendedores',
            'password' => 'required|min:6',
        ],[
            'email.unique' => 'O email já está cadastrado!',
            'nome.required' => 'O nome é requerido',
            'email.required' => 'O email é requerido',
            'password.required' => 'A senha é requerida',
            'password.min' => 'A senha deve ter no mínimo 6 caracteres',
        ]);


        /*dá para criar uma função e usar esse código para adcionar vendedores pela api*/
        /*pega os inputs do request post*/
        $nome = $request->input('nome');
        $email = $request->input('email');
        $senha = Hash::make($request->input('password')); //já faz a hash bcrypt

        $vendedor = new Vendedores(); //cria um objeto com a tabela vendedores

        /*faz o insert na tabela vendedores*/
        $vendedor->fill(
            [
                'name' => $nome,
                'email' => $email,
                'password' => $senha,
            ]);

        $vendedor->save();


        \Session::flash('mensagem_sucesso_vendedor', 'Vendedor cadastrado com sucesso!');
        return Redirect::to('vendedores');
    }

    public function deletar($id){
        $vendedor = Vendedores::findOrFail($id);
        $vendedor->delete();
        \Session::flash('mensagem_sucesso_vendedor', 'Vendedor deletado com sucesso!');
        return Redirect::to('vendedores');
    }
}
