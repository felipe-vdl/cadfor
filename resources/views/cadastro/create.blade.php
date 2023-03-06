@extends('layouts.app')

@section('content')
	<div class="container" style="padding-bottom: 150px;">
		<form method="POST" action="{{url('/')}}" enctype="multipart/form-data" id="form_cadastro">
			{{ csrf_field() }}
			<div class="card bg-light shadow-sm">
				<div class="card-header">
					<h2 class="card-title m-0 text-center">Cadastro de Fornecedores</h2>
				</div>
				<div class="card-body">
					@if(session()->get('error'))
					<div class="alert alert-danger m-0">
						<h5 class="alert-heading">Erro ao criar o cadastro.</h5>
						{{ session()->get('error') }}
					</div><br/>
					@endif
					<h3 class="card-title mb-1 text-center" title="Campos obrigatórios.">Dados da Empresa</h3>
					<div class="row">
						<div class="form-group col-12 col-md-6">
							<label class="form-label font-weight-bold" title="Campo obrigatório.">Razão Social: *</label>
							<input id="razao_social" name="razao_social" class="form-control form-control-sm" type="text" placeholder="Nome Comercial, Firma Empresarial ou Denominação Social" required>
						</div>
						<div class="form-group col-12 col-md-6">
							<label class="form-label font-weight-bold" title="Campo obrigatório.">CNPJ: *</label>
							<input id="cnpj" name="cnpj" class="form-control form-control-sm" type="text" placeholder="11.111.111/1111-11" minlength="18" required>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-12 col-md-6">
							<label class="form-label font-weight-bold" title="Campo opcional.">Inscrição Municipal (Opcional):</label>
							<input id="inscricao_municipal" name="inscricao_municipal" class="form-control form-control-sm" type="text" placeholder="N° da Inscrição Municipal">
						</div>
						<div class="form-group col-12 col-md-6">
							<label class="form-label font-weight-bold" title="Campo opcional.">Inscrição Estadual (Opcional):</label>
							<input id="inscricao_estadual" name="inscricao_estadual" class="form-control form-control-sm" type="text" placeholder="N° da Inscrição Estadual">
						</div>
					</div>
					<div class="row">
						<div class="form-group col-12 col-md-4">
							<label class="form-label font-weight-bold" title="Campo obrigatório.">Porte da Empresa: *</label>
							<select required id="porte_empresa" name="porte_empresa" class="form-control form-control-sm">
								<option value="">Selecione</option>
								<option value="EPP">EPP</option>
								<option value="ME">ME</option>
								<option value="N/A">Não se aplica.</option>
							</select>
						</div>
						<div class="form-group col-12 col-md-4">
							<label class="form-label font-weight-bold" title="Campo obrigatório.">Enquadramento da Empresa: *</label>
							<select required id="enquadramento_empresa" name="enquadramento_empresa" class="form-control form-control-sm">
								<option value="">Selecione</option>
								<option value="EI">EI</option>
								<option value="EIRELLI">EIRELLI</option>
								<option value="LTDA">LTDA</option>
								<option value="MEI">MEI</option>
								<option value="SA">SA</option>
								<option value="SLU">SLU</option>
							</select>
						</div>
						<div class="form-group col-12 col-md-4">
							<label class="form-label font-weight-bold" title="Campo opcional.">CNAE (Opcional):</label>
							<input id="cnae" name="cnae" class="form-control form-control-sm" type="text" placeholder="Código ou Atividade">
						</div>
					</div>
					<div class="row">
						<div class="form-group col-12">
							<label class="form-label font-weight-bold" title="Campo obrigatório.">Produtos e Serviços Ofertados: *</label>
							<input id="produtos" name="produtos" class="form-control form-control-sm" type="text" placeholder="Produtos e Serviços Ofertados pelo Fornecedor." required>
						</div>
					</div>
					<h3 class="card-title mb-1 mt-4 text-center" title="Campos obrigatórios.">Endereço</h3>
					<div class="row mt-3">
						<div class="form-group col-12 col-md-2">
							<label class="form-label font-weight-bold" title="Campo obrigatório.">CEP: *</label>
							<input id="cep" name="cep" onblur="pesquisacep(this.value);" class="form-control form-control-sm" type="text" placeholder="CEP" maxlength="9" required>
						</div>
						<div class="form-group col-12 col-md-2">
							<label class="form-label font-weight-bold" title="Campo obrigatório.">Logradouro: *</label>
							<input id="rua" name="rua" class="form-control form-control-sm" type="text" placeholder="Rua/Avenida" required>
						</div>
						<div class="form-group col-12 col-md-2">
							<label class="form-label font-weight-bold" title="Campo obrigatório.">Nº: *</label>
							<input id="numero_rua" name="numero_rua" class="form-control form-control-sm" type="text" placeholder="Número" required>
						</div>
						<div class="form-group col-12 col-md-2">
							<label class="form-label font-weight-bold" title="Campo obrigatório.">Bairro: *</label>
							<input id="bairro" name="bairro" class="form-control form-control-sm" type="text" placeholder="Bairro" required>
						</div>
						<div class="form-group col-12 col-md-2">
							<label class="form-label font-weight-bold" title="Campo obrigatório.">Município: *</label>
							<input id="municipio" name="municipio" class="form-control form-control-sm" type="text" placeholder="Município" required>
						</div>
						<div class="form-group col-12 col-md-2">
							<label class="form-label font-weight-bold" title="Campo obrigatório.">Estado: *</label>
							<select id="estado" name="estado" class="form-control form-control-sm" type="text" required>
								<option>Selecione</option>
								<option value="AC">AC</option>
								<option value="AL">AL</option>
								<option value="AP">AP</option>
								<option value="AM">AM</option>
								<option value="BA">BA</option>
								<option value="CE">CE</option>
								<option value="DF">DF</option>
								<option value="ES">ES</option>
								<option value="GO">GO</option>
								<option value="MA">MA</option>
								<option value="MT">MT</option>
								<option value="MS">MS</option>
								<option value="MG">MG</option>
								<option value="PA">PA</option>
								<option value="PB">PB</option>
								<option value="PR">PR</option>
								<option value="PE">PE</option>
								<option value="PI">PI</option>
								<option value="RJ">RJ</option>
								<option value="RN">RN</option>
								<option value="RS">RS</option>
								<option value="RO">RO</option>
								<option value="RR">RR</option>
								<option value="SC">SC</option>
								<option value="SP">SP</option>
								<option value="SE">SE</option>
								<option value="TO">TO</option>
							</select>
						</div>
					</div>
					<h3 class="card-title mb-1 mt-4 text-center" title="Campos obrigatórios.">Contato</h3>
					<div class="row mt-2">
						<div class="form-group col-12 col-md-4">
							<label class="form-label font-weight-bold" title="Campo obrigatório.">Nome do Responsável: *</label>
							<input id="responsavel" name="responsavel" class="form-control form-control-sm" type="text" placeholder="Responsável" required>
						</div>
						<div class="form-group col-12 col-md-4">
							<label class="form-label font-weight-bold" title="Campo obrigatório.">E-mail: *</label>
							<input id="email" name="email" class="form-control form-control-sm" type="text" placeholder="E-mail para Contato" required>
						</div>
						<div class="form-group col-12 col-md-4">
							<label class="form-label font-weight-bold" title="Campo obrigatório.">Telefone: *</label>
							<input id="telefone" name="telefone" class="form-control form-control-sm" type="text" placeholder="Telefone para Contato" required>
						</div>
					</div>
				</div>
				<div class="card-footer">
					<center>
						<div>
							<button type="submit" id="form_cadastro" class="botoes-acao btn btn-round btn-success enviar-relatorio">
								<span class="icone-botoes-acao mdi mdi-send"></span>
								<span class="texto-botoes-acao">Enviar Cadastro</span>
								<div class="ripple-container"></div>
							</button>
						</div> 
					</center>
				</div>
			</div>
		</form>
	</div>
	<div class="container" style="padding-top: 30px">
		@include('layouts.footer')
	</div>
@endsection

@push('scripts')
	<script type="text/javascript">
		$(document).ready(function(){
			VMasker ($("#cnpj")).maskPattern("99.999.999/9999-99");
			VMasker ($("#telefone")).maskPattern("(99)9999-99999");
			VMasker ($("#cep")).maskPattern("99999-999");
		});
	</script>
	<script>
		$(function(){
			$('body').submit(function(event){
			if ($(this).hasClass('enviar-relatorio')) {
				event.preventDefault();
			}
			else {
				$(this).find(':submit').html('<i class="fa fa-spinner fa-spin"></i>');
				$(this).addClass('enviar-relatorio');
			}
		});
		});
	</script>
	<!-- Via CEP -->
    <script>
		function limpa_formulário_cep() {
			//Limpa valores do formulário de cep.
			document.getElementById('rua').value="";
			document.getElementById('bairro').value="";
			document.getElementById('municipio').value="";
			document.getElementById('estado').value="";
		}
	
		function meu_callback(conteudo) {
			if (!("erro" in conteudo)) {
				//Atualiza os campos com os valores.
				document.getElementById('rua').value=(conteudo.logradouro);
				document.getElementById('bairro').value=(conteudo.bairro);
				document.getElementById('municipio').value=(conteudo.localidade);
				const estadoSelect = document.getElementById('estado');
				estadoSelect.value = conteudo.uf;
			} else {
				//CEP não Encontrado.
				console.log("CEP não encontrado");
				limpa_formulário_cep();
			}
		}
			
		function pesquisacep(valor) {
			//Nova variável "cep" somente com dígitos.
			let cep = valor.replace(/\D/g, '');
			//Verifica se campo cep possui valor informado.
			if (cep != "") {
				//Expressão regular para validar o CEP.
				var validacep = /^[0-9]{8}$/;
				//Valida o formato do CEP.
				if(validacep.test(cep)) {
					//Preenche os campos com "..." enquanto consulta webservice.
					document.getElementById('rua').value="...";
					document.getElementById('bairro').value="...";
					document.getElementById('municipio').value="...";
					//Cria um elemento javascript.
					let script = document.createElement('script');
					//Sincroniza com o callback.
					script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';
					//Insere script no documento e carrega o conteúdo.
					document.body.appendChild(script);
	
				} //end if.
				else {
					//cep é inválido.
					limpa_formulário_cep();
					alert("Formato de CEP inválido.");
				}
			} //end if.
			else {
				//cep sem valor, limpa formulário.
				limpa_formulário_cep();
			}
		};
	
		</script>
@endpush