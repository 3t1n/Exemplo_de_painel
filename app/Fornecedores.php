<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Fornecedores extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome',
        'email',
        'cpf_cnpj',
        'telefone',
        'cep',
        'bairro',
        'cidade',
        'uf',
        'logradouro',
        'numero',
        'complemento',
    ];

}
