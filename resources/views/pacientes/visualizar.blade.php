@extends('template')

@section('titulo', 'Paciente')


@push('css')
    <style>
        #dados-pacientes {
            padding: 0px 30px;
            margin: -20px 0px 20px;
        }
    </style>
@endpush

@section('conteudo')
<div class="user-data m-b-30">
        <h3 class="title-3 m-b-30">
        <i class="zmdi zmdi-account-calendar"></i>Paciente - {{$paciente->nome}}</h3>

        {{-- DADOS DOS PACIENTES --}}
        <div id="dados-pacientes">
            <!-- NOME -->
            <p><b>Nome: </b> {{ $paciente->nome }}</p>
            
            <!-- EMAIL -->
            <p><b>Email: </b> {{ $paciente->email }}</p>
            
            <!-- DATA NASCIMENTO -->
            <p><b>Data Nascimento: </b> {{ date('d/m/Y', strtotime($paciente->email)) }}</p>
        </div>
         
        {{-- FOTOS --}}
        <div class="table-responsive table-data">
               
            <h2 style="margin-left:30px">Fotos Enviadas</h2>
            <table class="table">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Data</td>
                        <td>Baixar</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($fotos as $foto)
                    <tr>
                        <!-- ID -->
                        <td><h6>{{$foto->id}}</h6></td>
                        <!-- DATA -->
                        <td>
                            <p>{{date('d/m/Y', strtotime($foto->data))}}</p>
                        </td>
                        <!-- OPÇÕES -->   
                        <td> 
                            <a target="_blank" href="{{route('fotos.baixar', ['id' => $foto->id])}}">
                                <span class="more"><i class="zmdi zmdi-download"></i></span>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
                    
        </div>
      
    </div>

@endsection