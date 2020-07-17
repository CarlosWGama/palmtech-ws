@extends('template')

@section('titulo', 'Edição de Médico')

@section('conteudo')


<div class="card">
    <div class="card-header">
        <strong>Edição</strong>
    </div>

    <form action="{{route('medicos.editar', ['id' => $medico->id])}}" method="post">
        
        <div class="card-body card-block">
            <!-- FORMULARIO -->
            @include('medicos._shared.form')
            <!-- FORMULARIO -->
        </div>
        
        <div class="card-footer">
            <button type="submit" class="btn btn-primary btn-sm">
                <i class="fa fa-save"></i> Editar
            </button>
        </div>
    </form>
</div>
@endsection