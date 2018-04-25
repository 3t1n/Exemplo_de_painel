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

        $nome = $request->only(['name']);
        $email = $request->only(['email']);
        $senha = $request->only(['password']);
        $senhaCrip = Hash::make($senha);
        return response()->json($nome,$email,$senhaCrip, 201);
        /*
        $vendedor = new Vendedores();
        $vendedor->fill($request->all());
        $vendedor->save();
        return response()->json($vendedor, 201);

*/
    }
}
