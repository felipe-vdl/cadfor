<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Config;
use App\Models\Cadastro;
use App\Models\Funcionario;

class CadastroController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $cadastros = Cadastro::all();
        return view('cadastro.index', compact('cadastros'));
    }

    public function create()
    {
        return view('cadastro.create');
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            // Dados do Formulário
            $this->validate($request,[
                'razao_social' => 'required',
                'cnpj' => 'required',
                'inscricao_municipal' => 'nullable',
                'inscricao_estadual' => 'nullable',
                'porte_empresa' => 'required',
                'enquadramento_empresa' => 'required',
                'cnae' => 'nullable',
                'produtos' => 'required',
                'cep' => 'required',
                'rua' => 'required',
                'numero_rua' => 'required',
                'bairro' => 'required',
                'municipio' => 'required',
                'estado' => 'required',
                'email' => 'required',
                'telefone' => 'required',
                'responsavel' => 'required',
            ]);

            $cadastro = new Cadastro($request->all());
            $cadastro->save();

            DB::commit();
            return redirect()->route('cadastros.sucesso');

        } catch (\Throwable $th) {
            dd($th);
            DB::rollback();
            return redirect('/')->with('error', 'Houve um erro ao criar o cadastro, tente novamente.');
        }
    }

    /* Tela de Sucesso após cadastro. */
    public function sucesso () {
        return view('cadastro.sucesso');
    }
    
    public function show(Request $request, $id)
    { 
        $cadastro = Cadastro::find($id);
        return view ('cadastro.show', compact('cadastro'));
    }
}