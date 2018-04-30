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

        /*dá para criar uma função e usar esse código para adcionar vendedores pela api*/
        /*pega os inputs do request post*/
        $nome = $request->input('nome');
        $teste = $request->input('email');

        $senha = Hash::make($request->input('inputPassword')); //já faz a hash bcrypt
        /*faz o insert na tabela vendedores*/
/*
 *
 *   $vendedor = new Vendedores(); //cria um objeto com a tabela vendedores
        $vendedor->fill(
            [
                'name' => $nome,
                'email' => $teste,
                'password' => $senha,
            ]);

        $vendedor->save();
*/
        /*resposta json para teste*/
        return response()->json(
            $nome,
            $teste,
            $senha
        );
/*
        \Session::flash('mensagem_sucesso_vendedor', 'Vendedor cadastrado com sucesso!');
        return Redirect::to('vendedores');*/
    }
}
