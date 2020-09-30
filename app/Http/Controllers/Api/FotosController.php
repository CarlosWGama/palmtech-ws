<?php

namespace App\Http\Controllers\Api;

use App\Models\Foto;
use Illuminate\Http\Request;

class FotosController extends ApiController {
    //

    public function __construct() {
        $this->middleware('medico')->except(['cadastrar', 'minhasFotos']);
    }

    /** Cadastra fotos do paciente */
    public function cadastrar(Request $request) {
        $pacienteID = $this->getUsuarioID($request);

        $foto = Foto::create([
            'paciente_id' => $pacienteID
        ]);


        //Caso tenha imagem, esquerda p1
        if (!empty($request->foto['esquerdo_p1'])) {
            $foto->esquerdo_p1 = $nomeArquivo = 'foto_'.$pacienteID.'_'.$foto->id.'_esquerdo_p1.jpg';
            $foto->esquerdo_p1_grid = 'foto_'.$pacienteID.'_'.$foto->id.'_esquerdo_p1_grid.png';
            $this->salvarImagem($request->foto['esquerdo_p1'], $nomeArquivo);
        }
        //Caso tenha imagem, esquerda p2
        if (!empty($request->foto['esquerdo_p2'])) {
            $foto->esquerdo_p2 = $nomeArquivo = 'foto_'.$pacienteID.'_'.$foto->id.'_esquerdo_p2.jpg';
            $foto->esquerdo_p2_grid = 'foto_'.$pacienteID.'_'.$foto->id.'_esquerdo_p2_grid.png';
            $this->salvarImagem($request->foto['esquerdo_p2'], $nomeArquivo);
        }
        //Caso tenha imagem, esquerda p3
        if (!empty($request->foto['esquerdo_p3'])) {
            $foto->esquerdo_p3 = $nomeArquivo = 'foto_'.$pacienteID.'_'.$foto->id.'_esquerdo_p3.jpg';
            $foto->esquerdo_p3_grid = 'foto_'.$pacienteID.'_'.$foto->id.'_esquerdo_p3_grid.png';
            $this->salvarImagem($request->foto['esquerdo_p3'], $nomeArquivo);
        }
        //Caso tenha imagem, esquerda p4
        if (!empty($request->foto['esquerdo_p4'])) {
            $foto->esquerdo_p4 = $nomeArquivo = 'foto_'.$pacienteID.'_'.$foto->id.'_esquerdo_p4.jpg';
            $foto->esquerdo_p4_grid = 'foto_'.$pacienteID.'_'.$foto->id.'_esquerdo_p4_grid.png';
            $this->salvarImagem($request->foto['esquerdo_p4'], $nomeArquivo);
        }
        //Caso tenha imagem, esquerda p5
        if (!empty($request->foto['esquerdo_p5'])) {
            $foto->esquerdo_p5 = $nomeArquivo = 'foto_'.$pacienteID.'_'.$foto->id.'_esquerdo_p5.jpg';
            $foto->esquerdo_p5_grid = 'foto_'.$pacienteID.'_'.$foto->id.'_esquerdo_p5_grid.png';
            $this->salvarImagem($request->foto['esquerdo_p5'], $nomeArquivo);
        }

        //Caso tenha imagem, direito p1
        if (!empty($request->foto['direito_p1'])) {
            $foto->direito_p1 = $nomeArquivo = 'foto_'.$pacienteID.'_'.$foto->id.'_direito_p1.jpg';
            $foto->direito_p1_grid = 'foto_'.$pacienteID.'_'.$foto->id.'_direito_p1_grid.png';
            $this->salvarImagem($request->foto['direito_p1'], $nomeArquivo);
        }
        //Caso tenha imagem, direito p2
        if (!empty($request->foto['direito_p2'])) {
            $foto->direito_p2 = $nomeArquivo = 'foto_'.$pacienteID.'_'.$foto->id.'_direito_p2.jpg';
            $foto->direito_p2_grid = 'foto_'.$pacienteID.'_'.$foto->id.'_direito_p2_grid.png';
            $this->salvarImagem($request->foto['direito_p2'], $nomeArquivo);
        }
        //Caso tenha imagem, direito p3
        if (!empty($request->foto['direito_p3'])) {
            $foto->direito_p3 = $nomeArquivo = 'foto_'.$pacienteID.'_'.$foto->id.'_direito_p3.jpg';
            $foto->direito_p3_grid = 'foto_'.$pacienteID.'_'.$foto->id.'_direito_p3_grid.png';
            $this->salvarImagem($request->foto['direito_p3'], $nomeArquivo);
        }
        //Caso tenha imagem, direito p4
        if (!empty($request->foto['direito_p4'])) {
            $foto->direito_p4 = $nomeArquivo = 'foto_'.$pacienteID.'_'.$foto->id.'_direito_p4.jpg';
            $foto->direito_p4_grid = 'foto_'.$pacienteID.'_'.$foto->id.'_direito_p4_grid.png';
            $this->salvarImagem($request->foto['direito_p4'], $nomeArquivo);
        }
        //Caso tenha imagem, direito p1
        if (!empty($request->foto['direito_p5'])) {
            $foto->direito_p5 = $nomeArquivo = 'foto_'.$pacienteID.'_'.$foto->id.'_direito_p5.jpg';
            $foto->direito_p5_grid = 'foto_'.$pacienteID.'_'.$foto->id.'_direito_p5_grid.png';
            $this->salvarImagem($request->foto['direito_p5'], $nomeArquivo);
        }
        
        $foto->save();
        return response()->json(['sucesso' => true], 200);
    }

    /** Lista as ultimas fotos enviadas */
    public function ultimas(int $inicio = 0, int $limite = 0) {
        $fotos = Foto::with('paciente')->offset($inicio)->limit($limite)->orderBy('id', 'desc')->get();
        return response()->json(['fotos' => $fotos], 200);
    }

    /** Lista as fotos de um paciente */
    public function listar(int $pacienteID, int $inicio = 0, int $limite = 0) {
        $fotos = Foto::with('paciente')->where('paciente_id', $pacienteID)->offset($inicio)->limit($limite)->orderBy('id', 'desc')->get();
        return response()->json(['fotos' => $fotos], 200);
    }

    /** Retorna as fotos do paciente logado */
    public function minhasFotos(Request $request, int $inicio = 0, int $limite = 0) {
        $pacienteID = $this->getUsuarioID($request);
        $fotos = Foto::where('paciente_id', $pacienteID)->offset($inicio)->limit($limite)->orderBy('id', 'desc')->get();
        return response()->json(['fotos' => $fotos], 200);
    }

    /** 
     * Recebe a imagem na base64
     * @param $uriBase64 | Imagem com toda URI data:image/png;base64,
     * @param $nomeArquivo | Qual nome do arquivo para ser salvo
     */
    private function salvarImagem(string $uriBase64, string $nomeArquivo) {
        $vetor = explode(',', $uriBase64);
        $imagemBase64 = end($vetor);
        file_put_contents(storage_path('app/public/fotos/'.$nomeArquivo), base64_decode($imagemBase64));
        $this->adicionarGrid($nomeArquivo);
    }

    /**
     * Adicionar imagem com Grid
     * @param $nomeArquivo | Imagem original que irá receber o grid 
     */
    private function adicionarGrid($nomeArquivo) {

        ini_set('memory_limit', '-1');

        $imagem = explode('.', $nomeArquivo);

        $original = storage_path('app/public/fotos/'.$nomeArquivo);
        $grid = storage_path('app/grid.png');
        $imageGrid = storage_path('app/public/fotos/'.$imagem[0].'_grid.png');

        $larguraFoto = 750;
        $alturaFoto = 1000;
        $original = imagecreatefromjpeg($original);
        $grid = imagecreatefrompng($grid);
        imagealphablending($original, true);
        imagesavealpha($original, true);
        imagecopy($original, $grid, 0, 0, 0, 0, $alturaFoto, $larguraFoto);
        imagepng($original, $imageGrid);
    }
}
