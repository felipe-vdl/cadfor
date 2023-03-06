<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cadastro extends Model
{
    protected $table = "cadastros";

    protected $fillable = [
        'razao_social',
        'cnpj',
        'porte_empresa',
        'enquadramento_empresa',
        'cnae',
        'inscricao_municipal',
        'inscricao_estadual',
        'produtos',
        'cep',
        'rua',
        'numero_rua',
        'bairro',
        'municipio',
        'estado',
        'email',
        'telefone',
        'responsavel',
    ];
}
