@extends('layouts.dashboard.app')
@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                    <div class="card-header card-header-info card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons"></i>
                        </div>
                        <h4 class="card-title">Dados da Empresa</h4>
                    </div>
                    <div class="card-body">
                        <div class="content">
                            <div class="p-0">
                                <div class="card card-plain m-0">
                                    <div class="card-body">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-12 col-md-6">
                                                    <h3 class="font-weight-bold mr-2 m-0">Dados da Empresa</h3>
                                                    <div class="row">
                                                        <div class="col-sm-6 col-lg-12">
                                                            <h4 class="pl-3 text-uppercase"><strong>Razão Social:</strong> <small>{{$cadastro->razao_social}}</small></h4>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-6 col-lg-12">
                                                            <h4 class="pl-3 text-uppercase"><strong>CNPJ:</strong> <small>{{$cadastro->cnpj}}</small></h4>
                                                        </div>
                                                    </div>
                                                    @if ($cadastro->inscricao_municipal)
                                                        <div class="row">
                                                            <div class="col-sm-6 col-lg-12">
                                                                <h4 class="pl-3 text-uppercase"><strong>Inscrição Municipal:</strong> <small>{{$cadastro->inscricao_municipal}}</></small></h4>
                                                            </div>
                                                        </div>
                                                    @endif
                                                    @if ($cadastro->inscricao_estadual)
                                                        <div class="row">
                                                            <div class="col-sm-6 col-lg-12">
                                                                <h4 class="pl-3 text-uppercase"><strong>Inscrição Estadual:</strong> <small>{{$cadastro->inscricao_estadual}}</></small></h4>
                                                            </div>
                                                        </div>
                                                    @endif
                                                    <div class="row">
                                                        <div class="col-sm-6 col-lg-12">
                                                            <h4 class="pl-3 text-uppercase"><strong>Porte:</strong> <small>{{$cadastro->porte_empresa}}</small></h4>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-6 col-lg-12">
                                                            <h4 class="pl-3 text-uppercase"><strong>Enquadramento:</strong> <small>{{$cadastro->enquadramento_empresa}}</small></h4>
                                                        </div>
                                                    </div>
                                                    @if ($cadastro->cnae)
                                                        <div class="row">
                                                            <div class="col-sm-6 col-lg-12">
                                                                <h4 class="pl-3 text-uppercase"><strong>CNAE:</strong> <small>{{$cadastro->cnae}}</></small></h4>
                                                            </div>
                                                        </div>
                                                    @endif
                                                    <div class="row">
                                                        <div class="col-sm-6 col-lg-12">
                                                            <h4 class="pl-3 text-uppercase m-0"><strong>Produtos/Serviços :</strong></h4>
                                                            <p class="pl-4 m-0 text-uppercase">{{$cadastro->produtos}}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6 mt-4 mt-md-0">
                                                    <h3 class="font-weight-bold mr-2 m-0">Endereço</h3>
                                                    <div class="row">
                                                        <div class="col-sm-6 col-lg-12">
                                                            <h4 class="pl-3 text-uppercase"><strong>CEP:</strong> <small>{{$cadastro->cep}}</small></h4>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-6 col-lg-12">
                                                            <h4 class="pl-3 text-uppercase"><strong>Logradouro:</strong> <small>{{$cadastro->rua.', nº '.$cadastro->numero_rua}}</small></h4>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-6 col-lg-12">
                                                            <h4 class="pl-3 text-uppercase"><strong>Bairro:</strong> <small>{{$cadastro->bairro}}</small></h4>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-6 col-lg-12">
                                                            <h4 class="pl-3 text-uppercase"><strong>Município:</strong> <small>{{$cadastro->municipio}}</small></h4>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-6 col-lg-12">
                                                            <h4 class="pl-3 text-uppercase"><strong>Estado:</strong> <small>{{$cadastro->estado}}</small></h4>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6 mt-4 mt-md-3">
                                                    <h3 class="font-weight-bold m-0">Contato</h3>
                                                    <div class="row">
                                                        <div class="col-sm-6 col-lg-12">
                                                            <h4 class="pl-3 text-uppercase"><strong>Email:</strong> <small>{{$cadastro->email}}</small></h4>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-6 col-lg-12">
                                                            <h4 class="pl-3 text-uppercase"><strong>Telefone:</strong> <small>{{$cadastro->telefone}}</small></h4>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-6 col-lg-12">
                                                            <h4 class="pl-3 text-uppercase"><strong>Nome do Responsável:</strong> <small>{{$cadastro->responsavel}}</small></h4>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-6 col-lg-12">
                                                            <h4 class="pl-3 text-uppercase"><strong>Data do Cadastro:</strong> <small>{{ date('d/m/Y', strtotime($cadastro->created_at))}}</small></h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
  </div>
</div>
@endsection
@push('scripts')
<script>
    document.querySelector('footer').style.display = 'none';
</script>
@endpush