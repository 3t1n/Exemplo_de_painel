<?php

namespace App\Http\Controllers;

use App\Vendedores;
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

        /*dá para criar uma função e usar esse código para adcionar vendedores pela api*/
        /*pega os inputs do request post*/
        $nome = $request->input('name');
        $email = $request->only('email');
        $senha = Hash::make($request->input('password')); //já faz a hash bcrypt

        $vendedor = new Vendedores(); //cria um objeto com a tabela vendedores
        /*faz o insert na tabela vendedores*/
        $vendedor->fill(
            [
                'name' => $nome,
                'email' => $email,
                'password' => $senha
            ]);
        $vendedor->save();
        /*resposta json para teste*/


        \Session::flash('mensagem_sucesso_vendedor', 'Vendedor cadastrado com sucesso!');
        return Redirect::to('vendedores');
    }
}
