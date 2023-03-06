<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Cadastro;

class ApiController extends Controller
{
    public function cadastros()
    {
        try {
            DB::beginTransaction();
            $cadastros = Cadastro::all();
            return json_encode($cadastros);

        } catch(Throwable $th) {
            DB::rollback();
            dd($th);
        }
    }

    public function cadastroPorId($id)
    {
        try {
            DB::beginTransaction();
            $cadastro = Cadastro::find($id);
            return json_encode($cadastro);

        } catch(Throwable $th) {
            DB::rollback();
            dd($th);
        }
    }
}
