@extends('template')

@section('titulo', 'Pacientes')

@section('conteudo')
<div class="user-data m-b-30">
        <h3 class="title-3 m-b-30">
            <i class="zmdi zmdi-account-calendar"></i>Pacientes Cadastrados</h3>

        <div class="table-responsive table-data">
                @if(session('sucesso'))
                <div class="alert alert-success" role="alert" style="margin:0px 10px">
                    {{session('sucesso')}}
                </div>
                @endif
            <table class="table">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Nome</td>
                        <td>Fotos</td>
                        <td>Opções</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pacientes as $paciente)
                    <tr>
                        <!-- ID -->
                        <td><h6>{{$paciente->id}}</h6></td>
                        <!-- NOME -->
                        <td>
                            <div class="table-data__info">
                                <h6>{{$paciente->nome}}</h6>
                                <span>
                                    <a href="#">{{$paciente->email}}</a>
                                </span>
                            </div>
                        </td>
                        <td>{{count($paciente->fotos)}}</td>
                        <!-- OPÇÕES -->   
                        <td>
                            <a href="{{route('pacientes.visualizar', ['id' => $paciente->id])}}">
                                <span class="more"><i class="zmdi zmdi-edit"></i></span>
                            </a>
                            <span class="more remover-modal" data-toggle="modal" data-target="#smallmodal" data-id="{{$paciente->id}}"><i class="zmdi zmdi-delete"></i></span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            
        <!-- Paginação -->
        <div style="padding:10px">{{$pacientes->links()}}</div>
        
        </div>
      
    </div>


    @push('javascript')
  <!-- modal small -->
  <div class="modal fade" id="smallmodal" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="smallmodalLabel">Remover Usuário</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>
                       Deseja Realmente excluir esse usuário?
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary btn-deletar">Confirmar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- end modal small -->

    <script>
        let pacienteID;
        $('.remover-modal').click(function() {
            pacienteID = $(this).data('id');
        })

        $('.btn-deletar').click(() => window.location.href="{{route('pacientes.excluir')}}/"+pacienteID);
    </script>
@endpush
@endsection