<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Usuario;
/**
 * @package API
 * Classe responsável por Controlar as requisições da API envolvendo usuário
 */
class PacientesController extends ApiController {

    public function __construct() {
        $this->middleware('medico')->except(['cadastrar']);
    }
    
    /** Cadastra uma nova tarefa */
    public function cadastrar(Request $request) {
        $validation = Validator::make($request->paciente, [
            'nome'              => 'required',
            'email'             => 'required|email|unique:usuarios,email',
            'data_nascimento'   => 'required',
            'senha'             => 'required|min:6'
        ]);

        if ($validation->fails()) {
            return response()->json($validation->errors(), 400);
        } else {
            $paciente = $request->paciente;
            $paciente['senha'] = md5($paciente['senha']);
            $paciente = Usuario::create($paciente);
            return response()->json($paciente, 201);
        }
    }

    /** Lista pacientes */
    public function listar(Request $request) {
        $pacientes = Usuario::where('medico', false)->get();
        return response()->json(['pacientes' => $pacientes], 200);
    }

    /** Busca um paciente
     * @param $id | id do paciente
     */
    public function buscar(Request $request, int $id) {
        $paciente = Usuario::where('id', $id)->where('medico', false)->firstOrFail();
        return response()->json(['paciente' => $paciente], 200);
    }

    /** Atualiza um paciente */
    public function atualizar(Request $request, int $id) {
        $paciente = Usuario::where('id', $id)->where('medico', false)->firstOrFail();

        $validation = Validator::make($request->paciente, [
            'nome'              => 'required',
            'email'             => 'required|email|unique:usuarios,email,'.$id,
            'data_nascimento'   => 'required',
            'senha'             => 'min:6'
        ]);

        if ($validation->fails()) return response()->json($validation->errors(), 400);
        
        $dados = $request->paciente;
        unset($dados['medico']);
        unset($dados['senha']);

        $paciente->fill($dados);

        if ($request->usuario['senha'])
            $paciente->senha = md5($request->usuario['senha']);

        $paciente->save();
        return response()->json($paciente, 200);
    }

    /**
     * Remove uma Tarefa do sistema
     * @param $id | id da tarefa
     */
    public function remover(Request $request, int $id) {
        $paciente = Usuario::where('medico', false)->where('id', $id)->firstOrFail();
        $paciente->delete();
        return response()->json('Paciente excluído com sucesso', 200);
    }
}
