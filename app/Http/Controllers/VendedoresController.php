<?php

namespace App\Http\Controllers;

use App\Vendedores;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class VendedoresController extends Controller
{
    public function vendedores_index(){
        return view('vendedores.vendedores');
    }
    public function registrar(Request $request){

        $nome = $request->input('name');
        $email = $request->input('email');
        $senha = Hash::make($request->input('password'));
        $vendedor = new Vendedores();
        $vendedor->fill(
            [
                'name' => $nome,
                'email' => $email,
                'password' => $senha
            ]);
        $vendedor->save();
        return response()->json($vendedor, 201);
    }
}
