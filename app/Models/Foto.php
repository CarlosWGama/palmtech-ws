<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Foto extends Model {
    
    use SoftDeletes;
    
    //Não protege nenhum campo
    protected $guarded = [];

    //Esconde os campos
    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    /**
     * Retorna os dados do usuário dono da tarefa
     * Inner Join
     */
    public function paciente() {
        return $this->belongsTo('App\Models\Usuario', 'paciente_id');
    }

    /**
     * Altera para a imagem ser exibida com a URL inteira.
     */
    public function getEsquerdoP1Attribute($value) {
        if (!empty($value))
            return url('storage/fotos/'.$value);
        return $value;
    }

    /**
     * Altera para a imagem ser exibida com a URL inteira.
     */
    public function getEsquerdoP2Attribute($value) {
        if (!empty($value))
            return url('storage/fotos/'.$value);
        return $value;
    }

    /**
     * Altera para a imagem ser exibida com a URL inteira.
     */
    public function getEsquerdoP3Attribute($value) {
        if (!empty($value))
            return url('storage/fotos/'.$value);
        return $value;
    }

    /**
     * Altera para a imagem ser exibida com a URL inteira.
     */
    public function getDireitoP1Attribute($value) {
        if (!empty($value))
            return url('storage/fotos/'.$value);
        return $value;
    }

    /**
     * Altera para a imagem ser exibida com a URL inteira.
     */
    public function getDireitoP2Attribute($value) {
        if (!empty($value))
            return url('storage/fotos/'.$value);
        return $value;
    }

    /**
     * Altera para a imagem ser exibida com a URL inteira.
     */
    public function getDireitoP3Attribute($value) {
        if (!empty($value))
            return url('storage/fotos/'.$value);
        return $value;
    }
}
