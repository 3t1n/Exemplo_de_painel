<?php

namespace App\Http\Controllers;

use App\Vendedores;
use Illuminate\Http\Request;

class VendedoresController extends Controller
{
    public function vendedores_index(){
        return view('vendedores.vendedores');
    }
    public function registrar(Request $request){

        $vendedor = new Vendedores();
        $vendedor->fill($request->all());
        $vendedor->save();
        return response()->json($vendedor, 201);


    }
}
