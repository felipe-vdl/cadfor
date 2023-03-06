@extends('layouts.dashboard.app')
@section('content')
<div class="content">
    <div class="container-fluid">
      <div class="row">
          <div class="col-md-12">
            @if(session()->get('success'))
              <div class="alert alert-success m-0">
                  {{ session()->get('success') }}
              </div>
			      @endif
            <div class="card ">
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
                      <i class="material-icons"></i>
                  </div>
                  <h4 class="card-title">Empresas Cadastradas</h4>
                </div>
                <div class="card-body ">
                  <div class="material-datatables">
                      <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                        <thead>
                          <tr>
                            <th class="text-center">Razão Social</th>
                            <th class="text-center">CNPJ</th>
                            {{-- <th class="text-center">Produtos/Serviços</th> --}}
                            <th class="text-center">Enquadramento</th>
                            <th class="text-center">Porte</th>
                            <th class="text-center">Data de Criação</th>
                            <th class="text-right">Ações</th>
                          </tr>
                        </thead>
                        <tfoot>
                          <tr>
                            <th><input class="text-center filter-input form-control" data-column="0" type="text" placeholder="Filtrar Razão Social"></input></th>
                            <th><input class="text-center filter-input form-control" data-column="2" type="text" placeholder="Filtrar CNPJ"></input></th>
                            {{-- <th><input class="text-center filter-input form-control" data-column="3" type="text" placeholder="Filtrar Produtos/Serviços"></input></th> --}}
                            <th><input class="text-center filter-input form-control" data-column="4" type="text" placeholder="Filtrar Enquadramento"></input></th>
                            <th><input class="text-center filter-input form-control" data-column="4" type="text" placeholder="Filtrar Porte"></input></th>
                            <th><input class="text-center filter-input form-control" data-column="5" type="text" placeholder="Filtrar Data de Criação"></input></th>
                            <th class="text-right"></th>
                          </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($cadastros as $cadastro)
                              <tr>
                                  <td class="text-center">{{$cadastro->razao_social}}</td>
                                  <td class="text-center">{{$cadastro->cnpj}}</td>
                                  {{-- <td class="text-center">{{$cadastro->produtos}}</td> --}}
                                  <td class="text-center">{{$cadastro->enquadramento_empresa}}</td>
                                  <td class="text-center">{{$cadastro->porte_empresa}}</td>
                                  <td class="text-center">{{date('d/m/Y', strtotime($cadastro->created_at))}}</td>
                                  <td class="text-right">
                                    <a  href="{{ url("/cadastros/$cadastro->id") }}" 
                                        class="btn btn-info btn-sm p-2"
                                        title="Detalhar cadastro.">
                                        <i class='material-icons'>search</i>
                                    </a>
                                  </td>
                              </tr>    
                            @endforeach
                        </tbody>
                      </table>
                    </div>
                </div>
            </div>
          </div>
      </div>
    </div>
</div>
@endsection

@push('scripts')
{{-- DataTables --}}
<script type="text/javascript">
// Euro Date
  jQuery.extend( jQuery.fn.dataTableExt.oSort, {
    "date-euro-pre": function ( a ) {
      var x;
      if ( a.trim() !== '' ) {
        var frDatea = a.trim().split(' ');
        var frTimea = (undefined != frDatea[1]) ? frDatea[1].split(':') : [00,00,00];
        var frDatea2 = frDatea[0].split('/');
        x = (frDatea2[2] + frDatea2[1] + frDatea2[0] + frTimea[0] + frTimea[1] + ((undefined != frTimea[2]) ? frTimea[2] : 0)) * 1;
      }
      else {
        x = Infinity;
      }

      return x;
    },

    "date-euro-asc": function ( a, b ) {
      return a - b;
    },

    "date-euro-desc": function ( a, b ) {
      return b - a;
    }
  });

// Tabela
  $(document).ready(function() {
    $.fn.dataTable.moment('DD/MM/YYYY');
    // Configuração geral
    const table = $('#datatables').DataTable({
      language : {
        'url' : '{{ asset('js/portugues.json') }}',
        "decimal": ",",
        "thousands": "."
      },
      stateSave: true,
      stateDuration: -1,
      responsive: true,
      deferRender: true,
      compact: true,
      processing: true,
      "columnDefs": [
        {"targets": 5, "orderable": false},
        { "type": 'date-euro', "targets": 4}
      ],
      "order": [[4, "desc"]]
    });

    //Filtro
    $('.filter-input').keyup(function() {
      table.column( $(this).data('column') )
      .search( $(this).val() )
      .draw();
    });
  });  
</script>
@endpush