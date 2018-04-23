<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VendedoresController extends Controller
{
    public function vendedores_index(){
        return view('vendedores.vendedores');
    }
}
