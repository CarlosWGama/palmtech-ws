<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Usuario extends Model {

    use SoftDeletes;
    
    //Não protege nenhum campo
    protected $guarded = [];

    //Não exibe esses campos
    protected $hidden = ['senha', 'medico', 'created_at', 'updated_at', 'deleted_at'];


    /** Retorna todas fotos dos pacientes */
    public function fotos() {
        return $this->hasMany('App\Models\Foto', 'paciente_id');
    }


}
