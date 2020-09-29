<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use App\Models\Usuario;
use Illuminate\Http\Request;

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
    public function baixar(Request $request, int $fotoID) {
        $foto = Foto::findOrFail($fotoID);
        
        $zip = new \ZipArchive();
        
        $arquivoZip = storage_path("app/public/fotos/fotos_$fotoID.zip"); 
        
        //Cria um novo
        if ($zip->open($arquivoZip, \ZipArchive::CREATE)===TRUE) {
        
            if ($foto->esquerdo_p1) {
                $zip->addFile(storage_path("app/public/fotos/".$this->nomeArquivo($foto->esquerdo_p1)), $this->nomeArquivo($foto->esquerdo_p1));
                $zip->addFile(storage_path("app/public/fotos/".$this->nomeArquivo($foto->esquerdo_p1_grid)), $this->nomeArquivo($foto->esquerdo_p1_grid));
            }
            if ($foto->esquerdo_p2) {
                $zip->addFile(storage_path("app/public/fotos/".$this->nomeArquivo($foto->esquerdo_p2)), $this->nomeArquivo($foto->esquerdo_p2));
                $zip->addFile(storage_path("app/public/fotos/".$this->nomeArquivo($foto->esquerdo_p2_grid)), $this->nomeArquivo($foto->esquerdo_p2_grid));
            }
            if ($foto->esquerdo_p3) {
                $zip->addFile(storage_path("app/public/fotos/".$this->nomeArquivo($foto->esquerdo_p3)), $this->nomeArquivo($foto->esquerdo_p3));
                $zip->addFile(storage_path("app/public/fotos/".$this->nomeArquivo($foto->esquerdo_p3_grid)), $this->nomeArquivo($foto->esquerdo_p3_grid));
            }
            if ($foto->esquerdo_p4) {
                $zip->addFile(storage_path("app/public/fotos/".$this->nomeArquivo($foto->esquerdo_p4)), $this->nomeArquivo($foto->esquerdo_p4));
                $zip->addFile(storage_path("app/public/fotos/".$this->nomeArquivo($foto->esquerdo_p4_grid)), $this->nomeArquivo($foto->esquerdo_p4_grid));
            }
            if ($foto->esquerdo_p5) {
                $zip->addFile(storage_path("app/public/fotos/".$this->nomeArquivo($foto->esquerdo_p5)), $this->nomeArquivo($foto->esquerdo_p5));
                $zip->addFile(storage_path("app/public/fotos/".$this->nomeArquivo($foto->esquerdo_p5_grid)), $this->nomeArquivo($foto->esquerdo_p5_grid));
            }
            
            if ($foto->direito_p1) {
                $zip->addFile(storage_path("app/public/fotos/".$this->nomeArquivo($foto->direito_p1)), $this->nomeArquivo($foto->direito_p1));
                $zip->addFile(storage_path("app/public/fotos/".$this->nomeArquivo($foto->direito_p1_grid)), $this->nomeArquivo($foto->direito_p1_grid));
            }
            if ($foto->direito_p2) {
                $zip->addFile(storage_path("app/public/fotos/".$this->nomeArquivo($foto->direito_p2)), $this->nomeArquivo($foto->direito_p2));
                $zip->addFile(storage_path("app/public/fotos/".$this->nomeArquivo($foto->direito_p2_grid)), $this->nomeArquivo($foto->direito_p2_grid));
            }
            if ($foto->direito_p3) {
                $zip->addFile(storage_path("app/public/fotos/".$this->nomeArquivo($foto->direito_p3)), $this->nomeArquivo($foto->direito_p3));
                $zip->addFile(storage_path("app/public/fotos/".$this->nomeArquivo($foto->direito_p3_grid)), $this->nomeArquivo($foto->direito_p3_grid));
            }
            if ($foto->direito_p4) {
                $zip->addFile(storage_path("app/public/fotos/".$this->nomeArquivo($foto->direito_p4)), $this->nomeArquivo($foto->direito_p4));
                $zip->addFile(storage_path("app/public/fotos/".$this->nomeArquivo($foto->direito_p4_grid)), $this->nomeArquivo($foto->direito_p4_grid));
            }
            if ($foto->direito_p5) {
                $zip->addFile(storage_path("app/public/fotos/".$this->nomeArquivo($foto->direito_p5)), $this->nomeArquivo($foto->direito_p5));
                $zip->addFile(storage_path("app/public/fotos/".$this->nomeArquivo($foto->direito_p5_grid)), $this->nomeArquivo($foto->direito_p5_grid));
            }

            $zip->close();
        } else {
            echo 'erro';die;
        }

        return redirect("storage/fotos/fotos_$fotoID.zip");

    }   

    private function nomeArquivo($url) {
        $partes = explode('/', $url);
        return end($partes);
    }

}
