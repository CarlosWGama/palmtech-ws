<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use App\Models\Usuario;

class PacientesController extends Controller {
    
    private $dados = ['menu' => 'pacientes'];

    /** Tela inicial com a listagem de pacientes */
    public function index() {
        $this->dados['pacientes'] = Usuario::where('medico', false)->with('fotos')->paginate(10);
        return view('pacientes.listar', $this->dados);
    }   

    /** 
     * Tela inicial com a listagem de pacientes 
     * @param
     * */
    public function visualizar(Request $request, int $id) {
        $this->dados['paciente'] = Usuario::findOrFail($id);
        $this->dados['fotos'] = Foto::where('paciente_id', $id)->get();
        return view('pacientes.visualizar', $this->dados);
    }   

    /**
     * Remove um paciente
     * @param $id id da tarefa
     */
    public function excluir(int $id) {
        Usuario::destroy($id);
        return redirect()->route('pacientes.listar')->with('sucesso', 'Paciente excluído');
    }

    /** Tela inicial com a listagem de pacientes */
    public function foto(Request $request, int $id) {
        $this->dados['foto'] = Foto::where('paciente_id', $id)->get();
        return view('pacientes.visualizar', $this->dados);
    }   

    /** Tela inicial com a listagem de pacientes */
    public function baixar(Request $request, int $id) {
        $this->dados['fotos'] = Foto::where('paciente_id', $id)->get();
        return view('pacientes.visualizar', $this->dados);
    }   

}
