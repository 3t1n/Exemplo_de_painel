<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FornecedoresController extends Controller
{
    public function fornecedores_index(){
        return view('fornecedores.fornecedores');
    }
}
