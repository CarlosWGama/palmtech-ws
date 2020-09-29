<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Foto extends Model {
    
    use SoftDeletes;
    
    //Não protege nenhum campo
    protected $guarded = [];

    //Informar os campos adicionaids
    protected $appends = ['data'];

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
    public function getEsquerdoP4Attribute($value) {
        if (!empty($value))
            return url('storage/fotos/'.$value);
        return $value;
    }
    /**
     * Altera para a imagem ser exibida com a URL inteira.
     */
    public function getEsquerdoP5Attribute($value) {
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
    
    /**
     * Altera para a imagem ser exibida com a URL inteira.
     */
    public function getDireitoP4Attribute($value) {
        if (!empty($value))
            return url('storage/fotos/'.$value);
        return $value;
    }
    
    /**
     * Altera para a imagem ser exibida com a URL inteira.
     */
    public function getDireitoP5Attribute($value) {
        if (!empty($value))
            return url('storage/fotos/'.$value);
        return $value;
    }

    /**
     * Altera para a imagem ser exibida com a URL inteira.
     */
    public function getEsquerdoP1GridAttribute($value) {
        if (!empty($value))
            return url('storage/fotos/'.$value);
        return $value;
    }

    /**
     * Altera para a imagem ser exibida com a URL inteira.
     */
    public function getEsquerdoP2GridAttribute($value) {
        if (!empty($value))
            return url('storage/fotos/'.$value);
        return $value;
    }

    /**
     * Altera para a imagem ser exibida com a URL inteira.
     */
    public function getEsquerdoP3GridAttribute($value) {
        if (!empty($value))
            return url('storage/fotos/'.$value);
        return $value;
    }

    /**
     * Altera para a imagem ser exibida com a URL inteira.
     */
    public function getEsquerdoP4GridAttribute($value) {
        if (!empty($value))
            return url('storage/fotos/'.$value);
        return $value;
    }
   
    /**
     * Altera para a imagem ser exibida com a URL inteira.
     */
    public function getEsquerdoP5GridAttribute($value) {
        if (!empty($value))
            return url('storage/fotos/'.$value);
        return $value;
    }

    /**
     * Altera para a imagem ser exibida com a URL inteira.
     */
    public function getDireitoP1GridAttribute($value) {
        if (!empty($value))
            return url('storage/fotos/'.$value);
        return $value;
    }

    /**
     * Altera para a imagem ser exibida com a URL inteira.
     */
    public function getDireitoP2GridAttribute($value) {
        if (!empty($value))
            return url('storage/fotos/'.$value);
        return $value;
    }

    /**
     * Altera para a imagem ser exibida com a URL inteira.
     */
    public function getDireitoP3GridAttribute($value) {
        if (!empty($value))
            return url('storage/fotos/'.$value);
        return $value;
    }

    /**
     * Altera para a imagem ser exibida com a URL inteira.
     */
    public function getDireitoP4GridAttribute($value) {
        if (!empty($value))
            return url('storage/fotos/'.$value);
        return $value;
    }
    
    /**
     * Altera para a imagem ser exibida com a URL inteira.
     */
    public function getDireitoP5GridAttribute($value) {
        if (!empty($value))
            return url('storage/fotos/'.$value);
        return $value;
    }

    /** Retorna a data de criação */
    public function getDataAttribute() {
        return substr($this->created_at, 0, 10);
    }
}
