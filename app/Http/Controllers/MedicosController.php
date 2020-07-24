<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

/**
 * Controller responsável pela manipulação dos dados do usuários 
 */
class MedicosController extends Controller {
    
    private $dados = ['menu' => 'usuarios'];

    /** Lista o usuários */
    public function index() {
        $this->dados['medicos'] = Usuario::where('medico', true)->paginate(10);
        return view('medicos.listar', $this->dados);
    }

    /** 
     * Abre a tela cadastrar novo usuário
     */
    public function novo() {
        $this->dados['medico'] = new Usuario;
        return view('medicos.novo', $this->dados);
    }

    /** 
     * Tenta salvar um novo usuário
     */
    public function cadastrar(Request $request) {
        $request->validate([
            'nome'  => 'required',
            'senha'  => 'required|min:6',
            //'email' => 'required|email|unique:usuarios,email',
        ]);
        $dados = $request->all();
        $dados['senha'] = md5($dados['senha']);
        $dados['medico'] = true;
        Usuario::create($dados);

        return redirect()->route('medicos.listar')->with(['sucesso' => 'Usuário cadastrado com sucesso']);
    }

    /** 
     * Abre a tela de editar usuário
     * @param $id id do usuário
     */
    public function edicao(int $id) {
        $this->dados['medico'] = Usuario::findOrFail($id);
        return view('medicos.edicao', $this->dados);
    }
    
    /** Tenta editar um usuário e salvar no banco
     * @param $id id do usuário
     */
    public function editar(Request $request, int $id) {
        $request->validate([
            'nome'  => 'required',
            //'email' => 'required|email|unique:usuarios,email,'.$id,
        ]);

        $dados = $request->except(['_token']);
        $dados['medico'] = true;
        if (!empty($dados['senha']))
            $dados['senha'] = md5($dados['senha']);
        else unset($dados['senha']);
        Usuario::where('id', $id)->update($dados);

        return redirect()->route('medicos.listar')->with(['sucesso' => 'Usuário editado com sucesso']);
    }
    
    /** Remove um usuário
     * @param $id id do usuário
     */
    public function excluir(int $id) {
        Usuario::destroy($id);
        return redirect()->route('medicos.listar')->with('sucesso', 'Usuário excluido');
    }
}
