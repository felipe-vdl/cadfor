@extends('layouts.app')

@section('content')
   <div class="container">
    <div class="card">
      <div class="card-header">
        <h4 class="align-middle mb-0">Cadastro realizado com sucesso</h4>
      </div>
      <div class="card-body">
        <p class="mb-0">Os dados da sua empresa agora constam na base de dados da prefeitura.</p>
      </div>
      <div class="card-footer text-center">
        <a href="{{ url('/') }}" class="btn btn-primary">Voltar</a>
      </div>
    </div>
   </div>
	<div class="container" style="padding-top: 30px">
		@include('layouts.footer')
	</div>
@endsection