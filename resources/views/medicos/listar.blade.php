@extends('template')

@section('titulo', 'Médicos')

@section('conteudo')
<div class="user-data m-b-30">
        <h3 class="title-3 m-b-30">
            <i class="zmdi zmdi-account-calendar"></i>Médicos Cadastrados</h3>
        <h5  style="margin-left:30px">Os médicos tem acesso aos pacientes pelo aplicativo ou gerenciador</h5>

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
                        <td>Opções</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($medicos as $medico)
                    <tr>
                        <!-- ID -->
                        <td><h6>{{$medico->id}}</h6></td>
                        <!-- NOME -->
                        <td>
                            <div class="table-data__info">
                                <h6>{{$medico->nome}}</h6>
                                <span>
                                    <a href="#">{{$medico->email}}</a>
                                </span>
                            </div>
                        </td>
                        <!-- OPÇÕES -->   
                        <td>
                            <a href="{{route('medicos.edicao', ['id' => $medico->id])}}">
                                <span class="more"><i class="zmdi zmdi-edit"></i></span>
                            </a>
                            <span class="more remover-modal" data-toggle="modal" data-target="#smallmodal" data-id="{{$medico->id}}"><i class="zmdi zmdi-delete"></i></span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            
        <!-- Paginação -->
        <div style="padding:10px">{{$medicos->links()}}</div>
        
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
        let medicoID;
        $('.remover-modal').click(function() {
            medicoID = $(this).data('id');
        })

        $('.btn-deletar').click(() => window.location.href="{{route('medicos.excluir')}}/"+medicoID);
    </script>
@endpush
@endsection