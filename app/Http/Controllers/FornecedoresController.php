<?php

namespace App\Http\Controllers;

use App\Fornecedores;
use Illuminate\Http\Request;
use Psy\Util\Json;
use Redirect;

class FornecedoresController extends Controller
{
    public function fornecedores_index(){
        $fornecedores = Fornecedores::get();
        return view('fornecedores.fornecedores',['fornecedores' => $fornecedores]);
    }
    public function registrar(Request $request){

        $this->validate($request,[
            'nome' => 'required|max:255',
            'email' => 'required|email|unique:fornecedores',
            'cpf_cnpj' => 'required|min:14|max:18',
            'telefone' => 'required|min:14|max:15',
            'cep' => 'required|max:9',
            'bairro' => 'required|max:255',
            'cidade' => 'required|max:255',
            'uf' => 'required|max:2',
            'logradouro' => 'required',
            'numero' => 'required|numeric',
            'complemento' => 'max:255',
        ],[
            'email.unique' => 'O email já está cadastrado!',
            'nome.required' => 'O nome é requerido',
            'email.required' => 'O email é requerido',
            'cpf_cnpj.required' => 'O cpf/cnpj é requerido',
            'telefone.required' => 'O telefone é requerido',
            'cep.required' => 'O cep é requerido',
            'bairro.required' => 'O bairro é requerido',
            'cidade.required' => 'O cidade é requerido',
            'uf.max' => 'O uf é requerido',
            'logradouro.required' => 'O logradouro é requerido',
            'numero.required' => 'O numero é requerido',
        ]);
        $fornecedores = new Fornecedores();
        $fornecedores->fill($request->all());
        $fornecedores->save();


        \Session::flash('mensagem_sucesso_fornecedor', 'Fornecedor cadastrado com sucesso!');
        return Redirect::to('fornecedores');
    }
    public function deletar($id){
        $fornecedores = Fornecedores::findOrFail($id);
        $fornecedores->delete();
        \Session::flash('mensagem_sucesso_fornecedor', 'Fornecedor deletado com sucesso!');
        return Redirect::to('fornecedores/');
    }
}
