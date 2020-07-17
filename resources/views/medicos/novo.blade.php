@extends('template')

@section('titulo', 'Novo Médico')

@section('conteudo')


<div class="card">
    <div class="card-header">
        <strong>Cadastro de Médico</strong>
    </div>

    <form action="{{route('medicos.cadastrar')}}" method="post">
        
        <div class="card-body card-block">
            <!-- FORMULARIO -->
            @include('medicos._shared.form')
            <!-- FORMULARIO -->
        </div>
        
        <div class="card-footer">
            <button type="submit" class="btn btn-primary btn-sm">
                <i class="fa fa-save"></i> Cadastrar
            </button>
        </div>
    </form>
</div>
@endsection