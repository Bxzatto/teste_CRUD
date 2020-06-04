<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{

    protected $fillable = ['nome','cpf_cnpj','municipio'];

    protected $table = 'empresa' ;

    public function contatos()
    {
        return $this->hasMany('App\Models\Contato', 'id_Empresa', 'id');
    }

    public function empresaJ()
    {
        return $this->hasOne('App\Models\Juridica', 'id_Empresa', 'id');
    }

        public function empresaF()
    {
        return $this->hasOne('App\Models\Fisica', 'id_Empresa', 'id');
    }
    
}