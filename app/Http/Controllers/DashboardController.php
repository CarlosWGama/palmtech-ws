<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use Illuminate\Http\Request;
use App\Models\Usuario;
/**
 * Tela Inicial do Admin
 */
class DashboardController extends Controller {
    private $dados = ['menu' => 'dashboard'];

    /** Tela Inicial do Dashboard */
    public function index() {
        $this->dados['totalPacientes'] = Usuario::where('medico', false)->count();
        $this->dados['totalFotos'] = Foto::count();
        return view('dashboard.index', $this->dados);
    }
}
